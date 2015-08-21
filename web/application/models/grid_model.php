<?php

class grid_model extends CI_Model {
	
	protected $gridname = "grid";
	protected $datatype = "json";
	protected $url = "";
	protected $editurl = "";
	protected $rowNum = 10;
	protected $hideCol = "";
	protected $colNames = "";
	protected $rowList = "[10,20,30]";
	protected $pager = "";
	protected $pageroptions = "edit:true,add:true,del:true";
	protected $colModel = "";
	protected $sortname = "";
	protected $viewrecords = "true";
	protected $sortorder = "desc";
	protected $width = "500";
	protected $scroll = "false";
	protected $height = "200";
	protected $caption = "jqGrid";
	protected $postData = "";
	protected $onSelectRow = "";
	protected $searchOptions = "";
	protected $deleteOptions = "";
	protected $ondblClickRow = "";
	protected $afterInsertRow = "";
	protected $editOptions = "";
	protected $addOptions = "";
	protected $altRows = "false";
	protected $hiddengrid = "false";
	protected $customVar = "var lastsel";
	protected $gridOptions = "";
	
	public function newgrid(){
		 $this->gridname = "grid";
		 $this->datatype = "json";
		 $this->url = "";
		 $this->editurl = "";
		 $this->rowNum = 10;
		 $this->hideCol = "";
		 $this->colNames = "";
		 $this->rowList = "[10,20,30]";
		 $this->pager = "";
		 $this->pageroptions = "edit:true,add:true,del:true";
		 $this->colModel = "";
		 $this->sortname = "";
		 $this->viewrecords = "true";
		 $this->sortorder = "desc";
		 $this->width = "500";
		 $this->scroll = "false";
		 $this->height = "200";
		 $this->caption = "jqGrid";
		 $this->postData = "";
		 $this->onSelectRow = "";
		 $this->searchOptions = "";
		 $this->deleteOptions = "";
		 $this->ondblClickRow = "";
		 $this->afterInsertRow = "";
		 $this->editOptions = "";
		 $this->addOptions = "";
		 $this->altRows = "false";
		 $this->hiddengrid = "false";
		 $this->customVar = "var lastsel";
		 $this->gridOptions = "";
	}
	
	public function setGridname($aGridName){
		if(!empty($aGridName)){
			$this->gridname = $aGridName;
		}
	}
	
	public function setDatatype($aDatatype = "json"){
		if(!empty($aDatatype)){
			$this->datatype = $aDatatype;
		}
	}
	
	public function setUrl($aUrl){
		if(!empty($aUrl)){
			$this->url = $aUrl;
		}
	}
	
	public function setEditurl($aEditurl){
		if(!empty($aEditurl)){
			$this->editurl = $aEditurl;
		}
	}
	
	public function setHideCol($aHideCol){
		if(!empty($aHideCol)){
			$this->hideCol = $aHideCol;
		}
	}
	
	public function setRowNum($aRowNum){
		if($aRowNum>0){
			$this->rowNum = $aRowNum;
		}
	}
	
	public function setColNames($aColNames){
		if(!empty($aColNames)){
			$this->colNames = $aColNames;
		}
	}
	
	public function setRowList($aRowList){
		if(!empty($aRowList)){
			$this->rowList = $aRowList;
		}
	}
	
	public function setPager($aPager){
		if(!empty($aPager)){
			$this->pager = $aPager;
		}
	}
	
	public function setPageroptions($aPageroptions){
		if(!empty($aPageroptions)){
			$this->pageroptions = $aPageroptions;
		}
	}
	
	public function setColModel($aColModel){
		if(!empty($aColModel)){
			$this->colModel = $aColModel;
		}
	}
	
	public function setSortname($aSortname){
		if(!empty($aSortname)){
			$this->sortname = $aSortname;
		}
	}
	
	public function setViewrecords($aViewrecords){
		if($aViewrecords === false){
			$this->viewrecords = "false";
		}
	}
	
	public function setSortorder($aSortorder){
		if(!empty($aSortorder)){
			$this->sortorder = $aSortorder;
		}
	}
	
	public function setWidth($aWidth){
		if(!empty($aWidth)){
			$this->width = $aWidth;
		}
	}
	
	public function setScroll($aScroll){
		if(!empty($aScroll)){
			$this->scroll = $aScroll;
		}
	}
	
	public function setHeight($aHeight){
		if(!empty($aHeight)){
			$this->height = $aHeight;
		}
	}
	
	public function setCaption($aCaption){
		if(!empty($aCaption)){
			$this->caption = $aCaption;
		}
	}
	
	public function setPostData($aPostData){
		if(!empty($aPostData)){
			$this->postData = $aPostData;
		}
	}
	
	public function setOnSelectRow($aOnSelectRow){
		if(!empty($aOnSelectRow)){
			$this->onSelectRow = $aOnSelectRow;
		}
	}
	
	public function setOnDblClickRow($aOnDblClickRow){
		if(!empty($aOnDblClickRow)){
			$this->ondblClickRow = $aOnDblClickRow;
		}
	}
	
	public function setSearchOptions($aSearchOptions){
		if(!empty($aSearchOptions)){
			$this->searchOptions = $aSearchOptions;
		}
	}
	
	public function setDeleteOptions($aDeleteOptions){
		if(!empty($aDeleteOptions)){
			$this->deleteOptions = $aDeleteOptions;
		}
	}
	
	public function setAfterInsertRow($aAfterInsertRow){
		if(!empty($aAfterInsertRow)){
			$this->afterInsertRow = $aAfterInsertRow;
		}
	}
	
	public function setEditOptions($aEditOptions){
		if(!empty($aEditOptions)){
			$this->editOptions = $aEditOptions;
		}
	}
	
	public function setAddOptions($aAddOptions){
		if(!empty($aAddOptions)){
			$this->addOptions = $aAddOptions;
		}
	}
	
	public function setAltRows($aAltRows){
		if(!empty($aAltRows)){
			$this->altRows = $aAltRows;
		}
	}
	
	public function setHiddengrid($aHiddengrid){
		if(!empty($aHiddengrid)){
			$this->hiddengrid = $aHiddengrid;
		}
	}
	
	public function setCustomVar($aCustomVar){
		if(!empty($aCustomVar)){
			$this->customVar = $aCustomVar;
		}
	}
	
	public function setArrGridOptions($arrGridOptions){
		foreach($arrGridOptions as $k => $v){
			$this->gridOptions .= $k.": ".$v."\n";
		}
	}
	
	public function getForeignValues($id,$name,$table,$empty=false){
		if($empty){
			$userLvlStr = "0:;";
		}else{
			$userLvlStr = "";
		}
		$sql = "SELECT $id,$name FROM $table";
		
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row){
					$userLvlStr .= $row[$id].":".$row[$name].";";
		}
		$userLvlStr = substr_replace($userLvlStr,"",-1);
		return $userLvlStr;
	}

	public function displayGrid(){
		if(empty($this->pager)){
			$this->pager = "p$this->gridname";
		}
		if(empty($this->editurl)){
			$this->editurl = $this->url;
		}
		
		//Build html body html
		$htmlbody = "<table id=\"".$this->gridname."\"></table>";
		$htmlbody .= "<div id=\"".$this->pager."\"></div>";		
		
		//Build head/onReady javascript
		
			$jsdoc = <<<GRIDDOC
			
			$this->customVar
			jQuery("#$this->gridname").jqGrid({
	  	 		url: '$this->url',
	  	 		editurl: '$this->editurl',
				datatype: '$this->datatype',
	   			colNames:$this->colNames,
	  			colModel:$this->colModel,
	   			rowNum:$this->rowNum,
	   			rowList:$this->rowList,
	   			pager: '#$this->pager',
	   			sortname: '$this->sortname',
	    		viewrecords: $this->viewrecords,
	    		sortorder: '$this->sortorder',
				caption: '$this->caption',
				scroll: $this->scroll,
				height: '$this->height',
				width: $this->width,
				altRows: $this->altRows,
				hiddengrid: $this->hiddengrid,
				postData:
						{ 
							$this->postData
						},
				onSelectRow: function(id){
								$this->onSelectRow
							   },
				ondblClickRow: function(id){
								$this->ondblClickRow
							   },
				afterInsertRow: function(rowid, aData, rowelem){
								$this->afterInsertRow
							   }
			}).navGrid('#$this->pager',
						{
							$this->pageroptions
						}, //pager options
						{
							$this->editOptions
						}, //edit options
						{
							$this->addOptions
						}, //add options
						{
							$this->deleteOptions
						}, //delete options
						{
							$this->searchOptions
						} //search options
					).hideCol($this->hideCol);
GRIDDOC;
		
		return array(
						"grid-js" => $jsdoc,
						"grid-html" => $htmlbody
					);
	}
	
	/*----====|| SETUP SEARCH CONDITION ||====----*/
	function _fnSearchCondition($searchOperation, $searchString){
        switch($searchOperation){
              case 'eq': $searchCondition = '= "'.$searchString.'"'; break;
              case 'ne': $searchCondition = '!= "'.$searchString.'"'; break;
              case 'bw': $searchCondition = 'LIKE "'.$searchString.'%"'; break;
              case 'ew': $searchCondition = 'LIKE "%'.$searchString.'"'; break;
              case 'cn': $searchCondition = 'LIKE "%'.$searchString.'%"'; break;
              case 'lt': $searchCondition = '< "'.$searchString.'"'; break;
              case 'gt': $searchCondition = '> "'.$searchString.'"'; break;
              case 'le': $searchCondition = '<= "'.$searchString.'"'; break;
              case 'ge': $searchCondition = '>= "'.$searchString.'"'; break;
        }
        return $searchCondition;
	}
	function _fnCleanInputVar($string){
        //$string = mysql_real_escape_string($string);
        return $string;
	}
	
	function getJsonCustom($tableName,$id,$columns,$replacecolumns=array())
    {
    	$crudTableName = $tableName;
    	$postConfig['id'] = $id;
		$crudColumns = $columns;
		
		/* jqGrid specific settings, don't need to be modified if using jqgrid  */
		$postConfig['search'] = '_search';                      /* search */
		$postConfig['searchField'] = 'searchField'; /* searchField */
		$postConfig['searchOper'] = 'searchOper';       /* searchOper */
		$postConfig['searchStr'] = 'searchString';      /* searchString */
		$postConfig['action'] = 'oper';                         /* action variable */
		$postConfig['sortColumn'] = 'sidx';             /* sort column */
		$postConfig['sortOrder'] = 'sord';                      /* sort order */
		$postConfig['page'] = 'page';                           /* current requested page */
		$postConfig['limit'] = 'rows';                          /* restrict number of rows to return */
		$crudConfig['row'] = 'cell';                            /* row data identifier */
		$crudConfig['read'] = 'oper';                           /* action READ keyword *//* set to be the same as action keyword for default */
		$crudConfig['create'] = 'add';                          /* action CREATE keyword */
		$crudConfig['update'] = 'edit';                         /* action UPDATE keyword */
		$crudConfig['delete'] = 'del';                          /* action DELETE keyword */
		$crudConfig['totalPages'] = 'total';            /* total pages */
		$crudConfig['totalRecords'] = 'records';        /* total records */
		$crudConfig['responseSuccess'] = 'success';     /* total records */
		$crudConfig['responseFailure'] = 'fail';        /* total records */
		/* end of jqgrid specific settings */
		$o=null;
		
    	/*----====|| GET and CLEAN THE POST VARIABLES ||====----*/
		foreach ($postConfig as $key => $value){
        	if(isset($_REQUEST[$value])){
                $postConfig[$key] = $this->_fnCleanInputVar($_REQUEST[$value]);
        	}
		}
		foreach ($crudColumns as $key => $value){
        	if(isset($_REQUEST[$key])){
                $crudColumnValues[$key] = '"'.$this->_fnCleanInputVar($_REQUEST[$key]).'"';
        	}
		}
		
		/*----====|| ACTION SWITCH ||====----*/
		
		switch($postConfig['action']){
        	case $crudConfig['read']:
        			
        		$query = $this->db->query('select * from '.$crudTableName);
        		$count = $query->num_rows();
        		$intLimit = $postConfig['limit'];
                /*set the page count*/
                if( $count > 0 && $intLimit > 0) { $total_pages = ceil($count/$intLimit); }
                else { $total_pages = 1; }
               
                $intPage = $postConfig['page'];
                if ($intPage > $total_pages){$intPage=$total_pages;}
                $intStart = (($intPage-1) * $intLimit);
        		
				$sql = 'select '.implode(',',$crudColumns).' from '.$crudTableName;
                if($postConfig['search'] == 'true'){
                        $sql .= ' WHERE ' . $postConfig['searchField'] . ' ' . $this->_fnSearchCondition($_REQUEST['searchOper'], $postConfig['searchStr']);
                }
                $sql .= ' ORDER BY ' . $postConfig['sortColumn'] . ' ' . $postConfig['sortOrder'];
                $sql .= ' LIMIT '.$intStart.','.$intLimit;
             
                $query = $this->db->query($sql);
           
                if (!isset($o))
                	$o = new stdClass();

                /*Create the output object*/
                $o->page = $intPage;
                $o->total = $total_pages;
                $o->records = $count;

                $i = 0;
				foreach ($query->result_array() as $row)
				{
					//$o->rows[$i][$postConfig['id']] = $row[$postConfig['id']];
					$o->rows[$i]['id'] = $row[$id];
					foreach (array_keys($row) as $column){
						foreach ($replacecolumns as $replacecolstr){
							$arrReplaceColInfo = explode(",",$replacecolstr);
							if($arrReplaceColInfo[0] == $column){
								if($arrReplaceColInfo[1] == "custom_val"){
									if($row[$column] == $arrReplaceColInfo[2]){
										$row[$column] = $arrReplaceColInfo[3];
									}									
								}else{
									if(!empty($row[$column])){
										$sql = 'select '.$arrReplaceColInfo[3].' from '.$arrReplaceColInfo[1].' where '.$arrReplaceColInfo[2].' = '.$row[$column];
										$replacequery = $this->db->query($sql);
										foreach ($replacequery->result_array() as $replacerow){
											$row[$column] = $replacerow[$arrReplaceColInfo[3]];
										}	
									}
								}
							}
						}
					}
					$o->rows[$i][$crudConfig['row']]=array_values($row);	
   					$i++;
				}              
                break;
        case $crudConfig['create']:	
                $sql = 'INSERT INTO '.$crudTableName.'(';
                /*add the list of columns */
                $sql .= implode(',',$crudColumns);
                /*  !!! add any additional columns not defined in the column array here. */
                $sql .= ')VALUES(';
                /* add the values from POST vars */
                $sql .= implode(',',$crudColumnValues);
                /*  !!! add any additional columns not defined in the column array here. */
                $sql .= ')';
                $sql = str_replace("\"_empty\"","null",$sql);
        	    $query = $this->db->query($sql);   
                break;
        case $crudConfig['update']:
            	 $sql = 'update '.$crudTableName.' set ';
                /* create all of the update statements */
                foreach($crudColumns as $key => $value){ 
                	if(!empty($crudColumnValues[$key])){
                		$updateArray[$key] = $value.'='.$crudColumnValues[$key]; 	
                	}
                };
                $sql .= implode(',',$updateArray);
                /* add any additonal update statements here */
                $sql .= ' where '.$id.' = '.$_REQUEST['id'];
                $query = $this->db->query($sql);           
                break;
        case $crudConfig['delete']:           		
        		$sql = 'DELETE FROM '.$crudTableName.' WHERE '.$id.' = '.$_REQUEST['id'];
                $query = $this->db->query($sql);	
                break;
        }
		/* ----====|| SEND OUTPUT ||====----*/
		print json_encode($o);
	   
    }
    
	private function _logIt($data){
		$myFile = "debugme.txt";
        $fh = fopen($myFile, 'a') or die("can't open file");
        fwrite($fh, "----------\r\n".$data."\r\n----------\r\n");
        fclose($fh);
	}  
}