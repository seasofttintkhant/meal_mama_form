<span class="search-inline-item pull-right" v-if="pagination.pages.length > 1">
  <span class="">
      <ul class="card-pagination">
        <li class="card-prev" v-if="pagination.prev_page_url">
            <a class="card-next-inner" tabindex="0" role="button" @click="changePage(pagination.current_page - 1)">
                <div class="card-icon-txt">
                  <div class="card-icon-gp">  
                    <div class="card-icon-txt-inner card-rotate-360">
                      <span class="card-icon-txt-right space-pl-10">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                      </span>
                    </div>
                    <div class="card-icon-txt">前へ</div>
                  </div>
                </div>
              </a>
          </li>
          <li class="card-pg-item" v-if="pagination.current_page > 3">
              <a role="button" class="card-item-inner" @click="changePage(1)">1</a>
            </li>
          
          <li class="card-pg-item card-pg-break" v-if="pagination.current_page > 4">...</li>

          <li class="card-pg-item" v-for="page in pagination.pages" v-if="page >= pagination.current_page - 2 && page <= pagination.current_page + 2" v-bind:class="{ 'disabled' : page == pagination.current_page}">
            <span role="button" class="card-item-inner unlink-bold" v-if="page == pagination.current_page">@{{page}}</span>
            <a role="button" class="card-item-inner" v-else="page == pagination.current_page" @click="changePage(page)">@{{page}}</a>
          </li>
          
          <li class="card-pg-item card-pg-break" v-if="pagination.current_page < pagination.last_page - 3">...</li>

          <li class="card-pg-item" v-if="pagination.current_page < pagination.last_page - 2">
            <a role="button" class="card-item-inner">@{{pagination.last_page}}</a>
          </li>
   
          <li class="card-next" v-if="pagination.next_page_url">
            <a class="card-next-inner" tabindex="0" role="button" @click="changePage(pagination.current_page + 1)">
              <div class="card-icon-txt">
                <div class="card-icon-gp">
                  <div class="card-icon-txt">前へ</div>
                  <div class="card-icon-txt-inner card-rotate-360">
                    <span class="card-icon-txt-right space-pl-10">
                      <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
              </div>
            </a>
          </li>
        </ul><!-- .card-pagination -->
  </span> 
</span><!-- .search-inline-item -->