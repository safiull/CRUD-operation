<?php

class crudOperation{

	private $data;
	private $table;
	private $insertBtn;
	private $editBtn;
	private $editUrl;
	private $editBtnDesign;
	private $deleteBtn;
	private $deleteUrl;
	private $deleteBtnDesign;

// This code for Add item work
	public function addButton($url="#",$lebel=" Add New ",$css_classes="btn btn-success"){
		$this->insertBtn = "<a href=\"$url\" class=\"$css_classes\">".$lebel."</a>";
		return $this;
	}

// This code for Edit item work
	public function editBtn($lebel=" Edit ",$url="edit.php",$css_classes="btn btn-info"){
		$this->editBtn = $lebel;
		$this->editUrl = $url;
		$this->editBtnDesign = $css_classes;
		return $this;
	}

// This code for Delete item work
	public function deleteBtn($lebel=" Delete ",$url="delete.php",$css_classes="btn btn-danger"){
		$this->deleteBtn = $lebel;
		$this->deleteUrl = $url;
		$this->deleteBtnDesign = $css_classes;
		return $this;
	}
// This code for edit item work


// This code for get item work
	public function setData($file){
		$json = file_get_contents("$file");
		$this->data = json_decode($json,true);
		
		return $this;
	}


// This code for create a table 
	public function createTable($css_classes="table table-bordered table-hover table-stripped table-condensed"){

		$this->table="<table class=\"$css_classes\">";
			$this->table.="<thead>";
				$this->table.="<tr>";
				$total=0;
					foreach ($this->data[0] as $key => $value) {
						$total++;
						$this->table.="<th>".ucfirst($key)."</th>";
					}
						if (isset($this->editBtn) || isset($this->deleteBtn)) {
							$this->table.="<th>Action</th>";
						}

				$this->table.="</tr>";

			$this->table.="</thead>";
			$this->table.= "<tbody>";
				foreach ($this->data as $row) {
					$this->table.="<tr>";
						foreach ($row as $value) {
							$this->table.="<td>$value</td>";
						}
						if (isset($this->editBtn) || isset($this->deleteBtn)) {
							$this->table.="<td>";
						
							if (isset($this->editBtn)) {
								$url = $this->editUrl;
								$editBtn = $this->editBtnDesign;

								$this->table.="<a class=\"$editBtn\" href=\"$url?id=$row[id]\">".$this->editBtn."</a>";
							}

							if (isset($this->deleteBtn)) {
								$url = $this->deleteUrl;
								$btnDesign = $this->deleteBtnDesign;
								$this->table.="<a href=\"$url?id=$row[id]\" class=\"$btnDesign\">".$this->deleteBtn."</a>";
								
							}
							$this->table.="</td>";
						}
						
					$this->table.="</tr>";
				}

				if (isset($this->insertBtn)) {
					$this->table.="<tr>";
						$this->table.="<td style=\"text-align:center\" colspan=\"$total\">".$this->insertBtn."</td>";
					$this->table.="</tr>";
				}


			$this->table.= "</tbody>";
		$this->table.="</table>";
		return $this->table;
	}
}


?>


</body>
</html>
