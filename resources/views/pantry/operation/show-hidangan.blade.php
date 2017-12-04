@if (count($datas)>0)
  <div class="panel-process">
    <span id="img-title"></span>
    <label id="label-title"></label>
    <button type="button" id="btncari" class="brick animasi">Cari</button>
    <div id="shsearch">
      <input type="text" id="incari" list="listsearch" class="animasi" onkeyup="search_data(this,'data-table')" placeholder="Cari Hidangan" title="Mencari data hidangan"/>
      <datalist id="listsearch">

      </datalist>
    </div>
    <button type="button" id="refresh" class="refresh"></button>
  </div>
  <div class="wrap-table">
    <div class="option">
      <label>Ubah ketersediaan : </label>
      @php
        switch ($status) {
          case 1:
          @endphp
            <button id="tersedia" type="button" onclick="conf_visibility('serialdata',1,'all','pantry')" style="background-size:20px;padding-left:34px;margin-right:5px;" class="green available1 prosesbtn animasi" name="notavailablebtn" disabled="disabled">Tersedia</button>
            <button id="tidaktersedia" type="button" onclick="conf_visibility('serialdata',0,'all','pantry')" style="background-size:20px;padding-left:34px" class="brick notavailable1 prosesbtn animasi" name="notavailablebtn" disabled="disabled">Tidak Tersedia</button>
            <script type="text/javascript">
              $("#refresh").attr("onclick","show('all')");
              $("#btncari").attr("onclick","cari_hidangan_db(2)");
            </script>
          @php
          break;
          case 2:
          @endphp
            <button id="tidaktersedia" type="button" onclick="conf_visibility('serialdata',0,'available','pantry')" style="background-size:20px;padding-left:34px" class="brick notavailable1 prosesbtn animasi" name="notavailablebtn" disabled="disabled">Tidak Tersedia</button>
            <script type="text/javascript">
              $("#refresh").attr("onclick","show('available')");
              $("#btncari").attr("onclick","cari_hidangan_db(1)");
            </script>
          @php
          break;
          case 3:
          @endphp
            <button id="tersedia" type="button" onclick="conf_visibility('serialdata',1,'notavailable','pantry')" style="background-size:20px;padding-left:34px" class="green available1 prosesbtn animasi" name="notavailablebtn" disabled="disabled">Tersedia</button>
            <script type="text/javascript">
              $("#refresh").attr("onclick","show('notavailable')");
              $("#btncari").attr("onclick","cari_hidangan_db(0)");
            </script>
          @php
          break;
        }
      @endphp
      <span>
        <input type="radio" onclick="set_metode_cari(this)" name="setcari" value="0" id="setcarihidangan" checked><label for="setcarihidangan">Cari Hidangan</label>
        <input type="radio" onclick="set_metode_cari(this)" name="setcari" value="1" id="setcaribahanbaku"><label for="setcaribahanbaku">Cari Dengan Bahan Baku</label>
      </span>
    </div>
    <form method="post" id="serialdata">

    </form>
    <table id="data-table" class="data-table alldatavisibility">
      <thead>
        <tr>
          <th><input type="checkbox" onclick="clickAllfood()" id="checkmaster"></th>
          <th>No</th>
          <th>Nama Hidangan</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody id="table-body">
        @php
          $i=1;
        @endphp
        @foreach ($datas as $data)
          @php
            if ($data->status==1) {
              $stsclass = "available1";
            }else{
              $stsclass = "notavailable1";
            }
          @endphp
          <tr>
            <td><input onclick="temp_data({{$i}},this,0)" type="checkbox" id="check{{$i}}" value="{{$data->no}}"></td>
            <td onclick="ceklis_tanda({{$i}})">{{$i}}</td>
            <td onclick="ceklis_tanda({{$i}})">{{$data->nama}}</td>
            <td onclick="ceklis_tanda({{$i++}})" class="{{$stsclass}} stsfood"></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script type="text/javascript">
    switch ({{$status}}) {
      case 1 : var logo = "allfood";var title = "Olah Ketersediaan | Semua Hidangan";break;
      case 2 : var logo = "available";var title = "Olah Ketersediaan | Hidangan Tersedia";break;
      case 3 : var logo = "notavailable";var title = "Olah Ketersediaan | Hidangan Tidak Tersedia";break;
    }
    $("#img-title").addClass(logo);
    $("#label-title").html(title);
  </script>
@else
  <center>
    <div class="not-found">
      {{$pesan}}
    </div>
  </center>
@endif
@if(session()->has('message'))
  <script>
  swal({
    title: "{{session()->get('title')}}",
    text: "{{session()->get('message')}}",
    type: "{{session()->get('type')}}",
    confirmButtonColor: "#2b5dcd",
    confirmButtonText: "OK",
    closeOnConfirm: true
  });
  </script>
  <?php session()->forget('message');?>
@endif
