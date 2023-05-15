<?php

class Score extends Model{
    protected $table = 'scores';

    public function __construct(){
        parent::__construct($this->table);
    }

    public function GetContestantScore($event_id, $contestant_id, $criteria_id, $judge_id){
        $scores = $this->findBy('event_id', $event_id);

        foreach($scores as $s){
            if($s->judge_id == $judge_id){
                if($s->contestant_id == $contestant_id){
                    if($s->criteria_id == $criteria_id){
                        return $s->score;
                    }
                }
            }
        }
    }

    function tabulateScores(array $scores): array
    {
        // Group scores by value
        $scoreGroups = array_reduce($scores, function ($groups, $score) {
            if (!isset($groups[$score])) {
                $groups[$score] = ['count' => 0, 'rank' => null];
            }
            $groups[$score]['count']++;
            return $groups;
        }, []);

        // Assign ranks to groups
        $rank = 1;
        foreach ($scoreGroups as &$group) {
            if ($group['rank'] !== null) {
                // If the rank is already assigned, move to next rank
                $rank++;
            }
            $group['rank'] = $rank;
            $rank += $group['count'] - 1;
        }

        // Convert groups to tabulated scores
        return array_map(function ($score) use ($scoreGroups) {
            return [
                'score' => $score,
                'count' => $scoreGroups[$score]['count'],
                'rank' => $scoreGroups[$score]['rank'] + ($scoreGroups[$score]['count'] - 1) / 2
            ];
        }, array_keys($scoreGroups));
    }
}