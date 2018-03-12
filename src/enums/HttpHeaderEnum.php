<?php

namespace yii2lab\misc\enums;

class HttpHeaderEnum extends BaseEnum {
	
	const TOTAL_COUNT = 'X-Pagination-Total-Count';
	const PAGE_COUNT = 'X-Pagination-Page-Count';
	const CURRENT_PAGE = 'X-Pagination-Current-Page';
	const PER_PAGE = 'X-Pagination-Per-Page';
	const CONTENT_TYPE = 'Content-Type';
	const AUTHORIZATION = 'Authorization';

}
