<form action="{{route('email.update')}}" method="post" accept-charset="utf-8" id="main-form">


{{ csrf_field() }}
      <ul class="definition-table">
          <li class="definition-table-item">
              <dl class="dl-definition-table">
                <dt class="definition-table-head">
                  <span class="definition-head-item">
                  </span>
                  <span class="definition-head-item definition-head-item-left card-pl-none">現在のメールアドレス
                  </span>
                </dt>
                <dd class="definition-table-body">
                  <div class="card-small-short space-pd-btm-sm card-fw-bold">
                    {{auth()->user()->email}}
                  </div>
                </dd>
              </dl>
            </li>
            <li class="definition-table-item card-input-br-btm">
              <dl class="dl-definition-table">
                <dt class="definition-table-head">
                  <span class="definition-head-item">
                    <span class="definition-label-red">必須
                    </span>
                  </span>
                  <span class="definition-head-item definition-head-item-left"><span>変更後の<br>メールアドレス</span>
                  </span>
                </dt>
                <dd class="definition-table-body">
                   <input type="email" name="email" id="email" class="definition-text-field definition-txt-error">
                  <span class="definition-txt-alert">メールアドレスを入力してください</span>
                </dd>              
              </dl>
            </li>
        </ul><!-- .definition-table -->
        <div class="space-mt-auto text-center">
         <input type="submit">
        </div>
        </form>