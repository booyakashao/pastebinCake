<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of utilities
 *
 * @author w.gu
 */
class Utilities {
    public function searchTermConcat($searchTerms){
        $searchTermArray = array('OR' => array());

	foreach($searchTerms as $searchTerm) {
            $searchTermArray['OR'][] = array('Pastebinentry.CONTENT LIKE' => "%$searchTerm%");
        }
        
        return $searchTermArray;
    }
}
