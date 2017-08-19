<?php

namespace App\Models\database\querybuilder;

use Core\Uri;



class SelectPaginateBuilder {

	private $maxLinks = 4;

	private $conditionsPaginate;

	public function __construct($conditionsPaginate) {
		$this->conditionsPaginate = $conditionsPaginate;
	}

	private function currentPage() {

		$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);

		if (isset($page) && $page > 0) {
			return $page;
		}

		return 1;

	}

	public function perPage($perPage) {
		$this->perPage = $perPage[0][0];
	}

	public function offset() {
		return ($this->currentPage() * $this->perPage) - $this->perPage;
	}

	public function allRecords() {
		$select = $this->conditionsPaginate->select;

		$select->execute();

		return $select->rowCount();
	}

	private function totalPages() {
		return ceil($this->allRecords() / $this->perPage);
	}

	public function link() {

		if ($this->conditionsPaginate->isSearch) {
			$search = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);

			return "?s=" . $search . "&page=";
		}

		return Uri::uri() . '?page=';

	}

	private function before() {
		$links = '';
		if ($this->currentPage() != 1) {
			$before = ($this->currentPage() - 1);
			$links = '<li><a href="' . $this->link() . '1"> [1] </a></li>';
			$links .= '<li><a href="' . $this->link() . $before . '" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a></li>';
		}
		return $links;
	}

	private function next() {
		$links = '';
		if ($this->currentPage() != $this->totalPages()) {
			$next = ($this->currentPage() + 1);
			$links = '<li><a href="' . $this->link() . $next . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
			$links .= '<li><a href="' . $this->link() . $this->totalPages() . '">[' . $this->totalPages() . ']</a></li>';
		}

		return $links;
	}

	public function showLinks($i) {
		$class = ($i == $this->currentPage()) ? 'actual' : '';

		if ($i > 0 && $i <= $this->totalPages()) {
			return "<li><a href='" . $this->link() . $i . "' class=" . $class . ">{$i}</a></li>";
		}
	}

	public function render() {

		if ($this->totalPages() > 0) {
			$links = "<ul class='pagination'>";
			$links .= $this->before();
			for ($i = $this->currentPage() - $this->maxLinks; $i <= $this->currentPage() + $this->maxLinks; $i++) {
				$links .= $this->showLinks($i);
			}
			$links .= $this->next();
			$links .= "</ul>";

			return $links;
		}

	}

	public function sqlToPaginate() {
		return " limit {$this->perPage} offset {$this->offset()}";
	}

}