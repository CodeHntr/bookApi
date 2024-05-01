<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookPaginateResource extends JsonResource
{
    public function toArray($request)
    {
        //$paginationLinks = $this->paginationLinks();//Силки які вертаються
        return [
            'currentPage' => $this->currentPage(),
            'lastPage' => $this->lastPage(),
            'data' => new BookCollection($this->getCollection()),
            //'links' => $paginationLinks
        ];
    }

    private function paginationLinks()
    {
        $links = $this->resource->toArray();
        $query = parse_url($links['first_page_url'], PHP_URL_QUERY);
        parse_str($query, $params);

        $paginationLinks = [
            'firstPageUrl' => $links['first_page_url'],
            'lastPageUrl' => $links['last_page_url'],
            'currentPageUrl' => $this->getCurrentPageUrl(),
            'nextPageUrl' => $links['next_page_url'],
            'prevPageUrl' => $links['prev_page_url'],
        ];

        return $paginationLinks;
    }

    private function getCurrentPageUrl()
    {
        $query = http_build_query(request()->except('page'));
        return url()->current() . '?' . $query;
    }
    
}

