<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuestionTemplate extends Model
{
	protected $table = "zapier_leadpops_qa";
	public $timestamps = false;

    public static function getPlaceholders($leadPopsId, $indexByField=false){
	    $questions = self::whereRaw('leadpops_id = ?', array($leadPopsId))->get();
	    if($questions->count() > 0){
		    if($indexByField){
			    $qa = array();
			    foreach($questions as $arr) {
				    $qa[$arr->funnel_variable] = $arr;
			    }
			    return $qa;
		    }else {
			    return $questions;
		    }
	    }else{
		    return false;
	    }
    }

	public static function getFunnelPlaceHolders($clientLeadpopId, $clientId=''){
		\DB::enableQueryLog();
		$query = "SELECT question as lead_key, answer as lead_val, zap_variable, GROUP_CONCAT(DISTINCT funnel_variable SEPARATOR '|') AS funnel_vars, is_function ";
		$query .= " FROM clients_leadpops INNER ";
		$query .= " JOIN zapier_leadpops_qa ON zapier_leadpops_qa.`leadpops_id` = clients_leadpops.`leadpop_id` ";
		$query .= " WHERE clients_leadpops.id = :client_leadpops_id ";
		if($clientId) $query .= " AND clients_leadpops.client_id = :client_id ";
		$query .= " GROUP BY zap_variable";
		$query .= " ORDER BY question";

		$param['client_leadpops_id'] = $clientLeadpopId;
		if($clientId) $param['client_id'] = $clientId;

		$questions = DB::select($query, $param);
		$queries = \DB::getQueryLog();
		if(@$_COOKIE['sql'] == 1 || @$_GET['debug'] == "sql"){ echo ("getFunnelPlaceHolders()"); echo "<pre>".print_r($queries, 1)."</pre>"; }
		return $questions;
	}

	public static function getSubVerticalPlaceholders($subverticalId, $clientId=''){
		\DB::enableQueryLog();
		$query = "SELECT question as lead_key, answer as lead_val, zap_variable, GROUP_CONCAT(DISTINCT funnel_variable SEPARATOR '|') as funnel_vars, is_function ";
		$query .= " FROM zapier_leadpops_qa ";
		$query .= " INNER JOIN leadpops ON leadpops.leadpop_vertical_sub_id = zapier_leadpops_qa.sub_vertical_id ";
		$query .= " INNER JOIN clients_leadpops ON clients_leadpops.leadpop_id = leadpops.id ";
		$query .= " WHERE zapier_leadpops_qa.sub_vertical_id = :sub_vertical_id ";

		if($clientId) $query .= " AND clients_leadpops.client_id = :client_id ";
		$query .= " GROUP BY zap_variable";
		$query .= " ORDER BY question";

		$param['sub_vertical_id'] = $subverticalId;
		if($clientId) $param['client_id'] = $clientId;

		$questions = DB::select($query, $param);
		$queries = \DB::getQueryLog();
		if(@$_COOKIE['sql'] == 1 || @$_GET['debug'] == "sql"){ echo ("getSubVerticalPlaceholders()"); echo "<pre>".print_r($queries, 1)."</pre>"; }
		return $questions;
	}

	public static function getGroupPlaceholders($groupId, $clientId=''){
		\DB::enableQueryLog();
		$query = "SELECT question as lead_key, answer as lead_val, zap_variable, GROUP_CONCAT(DISTINCT funnel_variable SEPARATOR '|') as funnel_vars, is_function ";
		$query .= " FROM zapier_leadpops_qa ";
		$query .= " INNER JOIN leadpops_verticals_sub ON zapier_leadpops_qa.sub_vertical_id = leadpops_verticals_sub.id ";
		$query .= " INNER JOIN leadpops ON leadpops.leadpop_vertical_sub_id = zapier_leadpops_qa.sub_vertical_id ";
		$query .= " INNER JOIN clients_leadpops ON clients_leadpops.leadpop_id = leadpops.id ";
		$query .= " WHERE leadpops_verticals_sub.group_id = :group_id ";

		if($clientId) $query .= " AND clients_leadpops.client_id = :client_id ";
		$query .= " GROUP BY zap_variable ORDER BY question";

		$param['group_id'] = $groupId;
		if($clientId) $param['client_id'] = $clientId;

		$questions = DB::select($query, $param);
		$queries = \DB::getQueryLog();
		if(@$_COOKIE['sql'] == 1 || @$_GET['debug'] == "sql"){ echo ("getGroupPlaceholders()"); echo "<pre>".print_r($queries, 1)."</pre>"; }
		return $questions;
	}

	public static function getVerticalPlaceholders($verticalId, $clientId=''){
		\DB::enableQueryLog();
		$query = "SELECT question as lead_key, answer as lead_val, zap_variable, GROUP_CONCAT(DISTINCT funnel_variable SEPARATOR '|') as funnel_vars, is_function ";
		$query .= " FROM zapier_leadpops_qa ";
		$query .= " INNER JOIN leadpops ON leadpops.leadpop_vertical_sub_id = zapier_leadpops_qa.sub_vertical_id ";
		$query .= " INNER JOIN clients_leadpops ON clients_leadpops.leadpop_id = leadpops.id ";
		$query .= " WHERE zapier_leadpops_qa.vertical_id = :vertical_id ";

		if($clientId) $query .= " AND clients_leadpops.client_id = :client_id ";
		$query .= " GROUP BY zap_variable";
		$query .= " ORDER BY question";

		$param['vertical_id'] = $verticalId;
		if($clientId) $param['client_id'] = $clientId;

		$questions = DB::select($query, $param);
		$queries = \DB::getQueryLog();
		if(@$_COOKIE['sql'] == 1 || @$_GET['debug'] == "sql"){ echo ("getVerticalPlaceholders()"); echo "<pre>".print_r($queries, 1)."</pre>"; }
		return $questions;
	}


	public static function getLastLeadByFunnel($event, $leadpop_identifier, $client_id){
		\DB::enableQueryLog();
		$queryParam = array();
		$queryParam['client_id'] = $client_id;

		$sql = "SELECT clients_leadpops.id AS clients_leadpops_id, leadpops_verticals_sub.group_id, lead_content.* FROM clients_leadpops INNER JOIN leadpops ON clients_leadpops.leadpop_id = leadpops.id ";
		$sql .= "INNER JOIN lead_content  ON (lead_content.leadpop_id = clients_leadpops.leadpop_id ";
		$sql .= "AND lead_content.leadpop_version_id = clients_leadpops.leadpop_version_id ";
		$sql .= "AND lead_content.leadpop_vertical_id = leadpops.leadpop_vertical_id ";
		$sql .= "AND lead_content.leadpop_vertical_sub_id = leadpops.leadpop_vertical_sub_id ";
		$sql .= "AND lead_content.client_id = clients_leadpops.client_id) ";
		$sql .= "INNER JOIN leadpops_verticals_sub ON leadpops_verticals_sub.id = lead_content.leadpop_vertical_sub_id ";
		$sql .= "WHERE clients_leadpops.client_id = :client_id ";
		if($event == config('zap_triggers.FunnelZap')){
			$sql .= "AND clients_leadpops.id = :clients_leadpop_id ";
			$queryParam['clients_leadpop_id'] = $leadpop_identifier;
		}
		else if($event == config('zap_triggers.SubverticalZap')){
			$sql .= "AND lead_content.leadpop_vertical_sub_id = :vertical_sub_id ";
			$queryParam['vertical_sub_id'] = $leadpop_identifier;
		}
		else if($event == config('zap_triggers.GroupZap')){
			$sql .= "AND leadpops_verticals_sub.group_id = :group_id ";
			$queryParam['group_id'] = $leadpop_identifier;
		}
		else if($event == config('zap_triggers.VerticalZap')){
			$sql .= "AND lead_content.leadpop_vertical_id = :vertical_id ";
			$queryParam['vertical_id'] = $leadpop_identifier;
		}

		$sql .= "ORDER BY lead_content.id DESC LIMIT 1";
		$lead_content = DB::select($sql, $queryParam);
		$queries = \DB::getQueryLog();
		if(@$_COOKIE['sql'] == 1 || @$_GET['debug'] == "sql"){ echo ("1# getLastLeadByFunnel()"); echo "<pre>".print_r($queries, 1)."</pre>"; }

		$contnet = array();
		if($lead_content){
			$contnet = $lead_content[0];
		}

		return $contnet;
	}

	public static function getLastLeadByFunnelV2($client_id,$queryFilters){
		\DB::enableQueryLog();
		$queryParam = array();
		$queryParam['client_id'] = $client_id;

		$sql = "SELECT clients_leadpops.id AS clients_leadpops_id,funnel_questions,clients_leadpops.leadpop_version_id as client_leadpop_version_id,clients_leadpops.leadpop_id as client_leadpop_id, lead_content.* FROM clients_leadpops INNER JOIN leadpops ON clients_leadpops.leadpop_id = leadpops.id ";
		$sql .= "LEFT JOIN (SELECT MAX(id) id, leadpop_id,client_id,lead_questions,lead_answers FROM lead_content GROUP BY leadpop_id) lead_content ON (lead_content.leadpop_id = clients_leadpops.leadpop_id AND lead_content.client_id = clients_leadpops.client_id) ";
        $sql .= " LEFT JOIN leadpops_client_tags ON (clients_leadpops.id = leadpops_client_tags.client_leadpop_id AND clients_leadpops.client_id = leadpops_client_tags.client_id)";
        $sql .= "WHERE clients_leadpops.client_id = :client_id ";

        if(array_key_exists('leadpop_funnel_id', $queryFilters)){
            $sql .= "AND clients_leadpops.id = :clients_leadpop_id ";
            $queryParam['clients_leadpop_id'] = $queryFilters['leadpop_funnel_id'];
            $sql .= "ORDER BY lead_content.id DESC LIMIT 1";
        }else{

            if(array_key_exists('leadpop_folder_id', $queryFilters)){
                $sql .= " AND clients_leadpops.leadpop_folder_id = :FOLDER_ID";
                $queryParam["FOLDER_ID"] = $queryFilters['leadpop_folder_id'];
            }

            if(array_key_exists('leadpop_tag_id', $queryFilters)){
                $sql .= " AND leadpops_client_tags.leadpop_tag_id = :TAG_ID";
                $queryParam["TAG_ID"] = $queryFilters['leadpop_tag_id'];
            }
            $sql .= " ORDER BY lead_content.id DESC";
        }

		$lead_content = DB::select($sql, $queryParam);

		$queries = \DB::getQueryLog();

		$contnet = array();
        if($lead_content){
		    foreach ($lead_content as $x=>$lead){
                $result = array();
                if($lead->lead_questions) {
                    $lead_questions = json_decode($lead->lead_questions);
                    $lead_answers = json_decode($lead->lead_answers);
                    foreach ($lead_questions as $key => $question) {
                        $result[$question] = $lead_answers->$key;
                    }
                    $contnet[] = $result;
                }else{
		            if($lead->client_leadpop_version_id == 126){
		                // to do next
                    }else{
                        $fields = array();
                        $funnel_questions = json_decode($lead->funnel_questions);
                        foreach ($funnel_questions as $y=>$qes){
                            $field_name = 'data-field';
                            if(isset($qes->options->$field_name)) {
                                $fields[] = $qes->options->$field_name;
                            }
                        }
                        $zapier_leads = ZapierLeadPopsQa::where('leadpops_id',$lead->client_leadpop_id)->whereIn('funnel_variable',$fields)->get();
                        foreach ($zapier_leads as $zapier_lead){
                            $result[$zapier_lead['question']] = $zapier_lead['answer'];
                        }
                        $contnet[] = $result;
                    }
                }
            }
        }
        $return_array['result'] = $contnet;
		return $return_array;
	}
}
