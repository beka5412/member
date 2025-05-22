@extends('storefront.user.user')
@section('page-title')
    {{__('Annotations')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@section('head-title')
@endsection
@section('content')


<style>
.buysell{
    max-width: 924px !important;
    margin-top: 120px !important;
    padding: 20px;
    border-radius: 10px;
    margin-inline: auto;
    width: 100%;
    border: 1px solid rgb(45, 45, 45);
}
</style>
<div class="nk-content nk-content-fluid">
  <div class="container-xl wide-lg">
    <div class="nk-content-body">
      <div class="buysell wide-xl m-auto">
        
        <div class="buysell-title text-center mt-5">
          <h3 class="title">Ranking da Comunidade Viver do Digital</h3>
        </div>
        <!-- .buysell-title -->
        <div class="buysell-block" style="margin-top: 50px">
          <div>
            <div class="row justify-between mb-4">
              <div class="col">
                <div style="display:flex">
                  <div style="font-size: 22px; width: 80px; text-align: center">1</div>
                  <div>
                    <div style="display:flex">
                      <div>
                        <div style="display:flex">
                          <div>
                            <img src="https://app.web3bank.finance/uploads/users/photos/64163543e9326.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                          </div>
                          <div style="position:absolute;">
                            <div>
                              <img src="https://app.web3bank.finance/images/rank/gold.png" alt="" style="width: 20px; margin-top: 30px; margin-left: 34px;">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div style="margin-left: 10px">
                        <div>
                          <b>Emilise Boff</b>
                        </div>
                        <div style="font-size: 12px">Hello, I am a participant of the Dr...</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 text-end">
                <span style="font-size: 20px; font-weight: bold; color: var(--green)">91,054.16</span>
                <span style="font-size: 12px;">xp</span>
              </div>
            </div>
            <div class="row justify-between mb-4">
              <div class="col">
                <div style="display:flex">
                  <div style="font-size: 22px; width: 80px; text-align: center">2</div>
                  <div>
                    <div style="display:flex">
                      <div>
                        <div style="display:flex">
                          <div>
                            <img src="https://app.web3bank.finance/uploads/users/photos/641657f75281b.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                          </div>
                          <div style="position:absolute;">
                            <div>
                              <img src="https://app.web3bank.finance/images/rank/silver.png" alt="" style="width: 20px; margin-top: 30px; margin-left: 34px;">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div style="margin-left: 10px">
                        <div>
                          <b>Eduardo Boff</b>
                        </div>
                        <div style="font-size: 12px">Hello, I am a participant of the Dr...</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 text-end">
                <span style="font-size: 20px; font-weight: bold; color: var(--green)">90,850.74</span>
                <span style="font-size: 12px;">xp</span>
              </div>
            </div>
            <div class="row justify-between mb-4">
              <div class="col">
                <div style="display:flex">
                  <div style="font-size: 22px; width: 80px; text-align: center">3</div>
                  <div>
                    <div style="display:flex">
                      <div>
                        <div style="display:flex">
                          <div>
                            <img src="https://app.web3bank.finance/images/user.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                          </div>
                          <div style="position:absolute;">
                            <div>
                              <img src="https://app.web3bank.finance/images/rank/bronze.png" alt="" style="width: 20px; margin-top: 30px; margin-left: 34px;">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div style="margin-left: 10px">
                        <div>
                          <b>Alex Sandro Minze Go...</b>
                        </div>
                        <div style="font-size: 12px">Hello, I am a participant of the Dr...</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 text-end">
                <span style="font-size: 20px; font-weight: bold; color: var(--green)">90,217.42</span>
                <span style="font-size: 12px;">xp</span>
              </div>
            </div>
            <div class="row justify-between mb-4">
              <div class="col">
                <div style="display:flex">
                  <div style="font-size: 22px; width: 80px; text-align: center">4</div>
                  <div>
                    <div style="display:flex">
                      <div>
                        <div style="display:flex">
                          <div>
                            <img src="https://app.web3bank.finance/images/user.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                          </div>
                          <div style="position:absolute;">
                            <div></div>
                          </div>
                        </div>
                      </div>
                      <div style="margin-left: 10px">
                        <div>
                          <b>Alex Gouvea</b>
                        </div>
                        <div style="font-size: 12px">Hello, I am a participant of the Dr...</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 text-end">
                <span style="font-size: 20px; font-weight: bold; color: var(--green)">79,630.17</span>
                <span style="font-size: 12px;">xp</span>
              </div>
            </div>
            <div class="row justify-between mb-4">
              <div class="col">
                <div style="display:flex">
                  <div style="font-size: 22px; width: 80px; text-align: center">5</div>
                  <div>
                    <div style="display:flex">
                      <div>
                        <div style="display:flex">
                          <div>
                            <img src="https://app.web3bank.finance/images/user.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                          </div>
                          <div style="position:absolute;">
                            <div></div>
                          </div>
                        </div>
                      </div>
                      <div style="margin-left: 10px">
                        <div>
                          <b>Gyovanna Bastos</b>
                        </div>
                        <div style="font-size: 12px">Hello, I am a participant of the Dr...</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 text-end">
                <span style="font-size: 20px; font-weight: bold; color: var(--green)">74,996.71</span>
                <span style="font-size: 12px;">xp</span>
              </div>
            </div>
            <div class="row justify-between mb-4">
              <div class="col">
                <div style="display:flex">
                  <div style="font-size: 22px; width: 80px; text-align: center">6</div>
                  <div>
                    <div style="display:flex">
                      <div>
                        <div style="display:flex">
                          <div>
                            <img src="https://app.web3bank.finance/uploads/users/photos/640bc09a41b22.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                          </div>
                          <div style="position:absolute;">
                            <div></div>
                          </div>
                        </div>
                      </div>
                      <div style="margin-left: 10px">
                        <div>
                          <b>João Matheus Azevedo...</b>
                        </div>
                        <div style="font-size: 12px">Hello, I am a participant of the Dr...</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 text-end">
                <span style="font-size: 20px; font-weight: bold; color: var(--green)">70,592.15</span>
                <span style="font-size: 12px;">xp</span>
              </div>
            </div>
            <div class="row justify-between mb-4">
              <div class="col">
                <div style="display:flex">
                  <div style="font-size: 22px; width: 80px; text-align: center">7</div>
                  <div>
                    <div style="display:flex">
                      <div>
                        <div style="display:flex">
                          <div>
                            <img src="https://app.web3bank.finance/uploads/users/photos/64078b7f9d7e1.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                          </div>
                          <div style="position:absolute;">
                            <div></div>
                          </div>
                        </div>
                      </div>
                      <div style="margin-left: 10px">
                        <div>
                          <b>Rogerio Sbardelotto</b>
                        </div>
                        <div style="font-size: 12px">Hello, I am a participant of the Dr...</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 text-end">
                <span style="font-size: 20px; font-weight: bold; color: var(--green)">67,009.23</span>
                <span style="font-size: 12px;">xp</span>
              </div>
            </div>
            <div class="row justify-between mb-4">
              <div class="col">
                <div style="display:flex">
                  <div style="font-size: 22px; width: 80px; text-align: center">8</div>
                  <div>
                    <div style="display:flex">
                      <div>
                        <div style="display:flex">
                          <div>
                            <img src="https://app.web3bank.finance/uploads/users/photos/6438155cbe761.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                          </div>
                          <div style="position:absolute;">
                            <div></div>
                          </div>
                        </div>
                      </div>
                      <div style="margin-left: 10px">
                        <div>
                          <b>Moacir Oliveira</b>
                        </div>
                        <div style="font-size: 12px">Hello, I am a participant of the Dr...</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 text-end">
                <span style="font-size: 20px; font-weight: bold; color: var(--green)">56,772.04</span>
                <span style="font-size: 12px;">xp</span>
              </div>
            </div>
            <div class="row justify-between mb-4">
              <div class="col">
                <div style="display:flex">
                  <div style="font-size: 22px; width: 80px; text-align: center">9</div>
                  <div>
                    <div style="display:flex">
                      <div>
                        <div style="display:flex">
                          <div>
                            <img src="https://app.web3bank.finance/uploads/users/photos/640dca42951ba.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                          </div>
                          <div style="position:absolute;">
                            <div></div>
                          </div>
                        </div>
                      </div>
                      <div style="margin-left: 10px">
                        <div>
                          <b>Washington Duarte</b>
                        </div>
                        <div style="font-size: 12px">Hello, I am a participant of the Dr...</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 text-end">
                <span style="font-size: 20px; font-weight: bold; color: var(--green)">51,061.19</span>
                <span style="font-size: 12px;">xp</span>
              </div>
            </div>
            <div class="row justify-between mb-4">
              <div class="col">
                <div style="display:flex">
                  <div style="font-size: 22px; width: 80px; text-align: center">10</div>
                  <div>
                    <div style="display:flex">
                      <div>
                        <div style="display:flex">
                          <div>
                            <img src="https://app.web3bank.finance/uploads/users/photos/6382572fe9456.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                          </div>
                          <div style="position:absolute;">
                            <div></div>
                          </div>
                        </div>
                      </div>
                      <div style="margin-left: 10px">
                        <div>
                          <b>CHIRON CEDRIC</b>
                        </div>
                        <div style="font-size: 12px">France</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 text-end">
                <span style="font-size: 20px; font-weight: bold; color: var(--green)">48,004.09</span>
                <span style="font-size: 12px;">xp</span>
              </div>
            </div>
           
          </div>
        </div>
        <!-- .buysell-block -->
      </div>
      <!-- .buysell -->
    </div>
  </div>
</div>
@endsection