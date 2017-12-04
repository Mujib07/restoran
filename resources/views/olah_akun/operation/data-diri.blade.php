@foreach ($datas as $data)
@endforeach
<div id="paneldiri" class="panel-process">
  <span id="img-title" class="personaldata"></span>
  <label id="label-title">Data Diri</label>
</div>
<div id="paneleditor">
  <div id="left">
    <div class="image-config">
      <div id="image-edit" class="image-edit">
        {{-- <img src="{{$_SESSION["icon"]}}" name="img" id="img"> --}}
        <img src="{{$url}}" name="img" id="img">
      </div>
      <div class="image-option">
        <center>
          <button id="unggah" style="margin-right: 5px" type="button" onclick="browse()" class="brick blackupload prosesbtn animasi" name="button">UNGGAH</button>
          <input id="mask-browse" class="mask-browse" name="maskbrowse" onchange="ValidateSingleInput(this)" type="file">
          <button id="delete-image" type="button" onclick="delete_image()" class="green1 blacktrash prosesbtn animasi" name="button">HAPUS</button>
          <input id="path" type="hidden" readonly>
        </center>
      </div>
    </div>
  </div>
  <form method="post" id="serialize">
    <div id="right">
        <input type="hidden" name="tempimg" id="tempimg" value=1>
        <fieldset>
          <label for="nip">*NIP :</label>
          <input type="text" name="nip" id="nip" readonly value="{{$data->nip}}">

          <label for="nama">*Nama Anda :</label>
          <input type="text" name="nama" id="nama" value="{{$data->nama}}">

          <label for="jabatan">*Jabatan :</label>
          <input type="text" name="jabatan" id="jabatan" readonly value="{{$data->jabatan}}">

          <label>*Jenis Kelamin :</label>
          <div class="panelradio">
            <input type="radio" name="kelamin" value="P" id="P"><label for="P">Pria</label>
            <input type="radio" name="kelamin" value="W" id="W"><label for="W">Wanita</label>
            <script type="text/javascript">
              document.getElementById("{{$data->kelamin}}").checked=true;
            </script>
          </div>

          <label for="masuk">*Tanggal Masuk :</label>
          <input type="text" name="masuk" id="masuk" value="{{$data->masuk}}" readonly>

          <label for="telepon">Telepon :</label>
          <input type="text" name="telepon" id="telepon" value="{{$data->telepon}}">
        </fieldset>
    </div>
    <div id="bottom">
      <label for="alamat">Alamat :</label>
      <textarea name="alamat" id="alamat">{{$data->alamat}}</textarea>
      <center>
        <button onclick="simpan_perubahan()" style="margin-right: 5px;margin-bottom: 5px;" class="green save prosesbtn animasi" type="button">Simpan</button>
        <button type="button" onclick="location.reload(true)" class="red animasi">Batal</button>
      </center>
    </div>
  </form>
</div>
<script type="text/javascript">
  var cek_gambar = $("#img").attr('src');
  if(cek_gambar!="{!! asset('public/gambar/notfound.png') !!}"){
    $("#unggah").attr('disabled','disabled');
  }else{
    $("#delete-image").attr('disabled','disabled');
  }
</script>
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
