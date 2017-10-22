<md-dialog style="width: 1200px;">
    <div class="panel-heading" style="background: #33425b;">
        <span class="font-bold"><center><font color="white">DATA KARYAWAN LAUNDRY</font></center></span>
    </div>


                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">NIK</label>
                            <div  class="col-sm-9">
                                <p class="form-control-static">
                                    <span style="padding-left: 8px;"></span>{{nik}}
                                </p>
                            </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div  class="col-sm-9">
                                <p class="form-control-static">
                                    <span style="padding-left: 8px;"></span>{{nama}}
                                </p>
                            </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">alamat</label>
                            <div  class="col-sm-9">
                                <p class="form-control-static">
                                    <span style="padding-left: 8px;"></span>{{alamat}}
                                </p>
                            </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telphone</label>
                            <div  class="col-sm-9">
                                <p class="form-control-static">
                                    <span style="padding-left: 8px;"></span>{{telp}}
                                </p>
                            </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div  class="col-sm-9">
                                <p class="form-control-static">
                                    <span style="padding-left: 8px;"></span>{{gender}}
                                </p>
                            </div>
                    </div>
                </div>
    <footer class="panel-footer text-center" style="background: #33425b">
        <md-button class="btn btn-fw btn-default" ng-click='cancel()' tooltip="Kembali">
            Kembali
        </md-button>
    </footer>
</md-dialog>
