<title>Select berhubungan dengan codeigniter dan ajax</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
    <br/>
    <div class="col-md-6 col-md-offset-3">
        <div class="thumbnail">
            <h4><center>Membuat Select berhubungan dengan codeigiter</center></h4><hr/>
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-3">Kategori</label>
                    <div class="col-md-8">
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="0">-PILIH-</option>
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->kategori_id;?>"><?php echo $row->kategori_nama;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Sub Kategori</label>
                    <div class="col-md-8">
                        <select name="subkategori" class="subkategori form-control">
                            <option value="0">-PILIH-</option>
                        </select>
                    </div>
                     
                </div>
            </form>
            <hr/>
            <p style="text-align: center;">Powered by <a href="">mfikri.com</a></p>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#kategori').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/kategori/get_subkategori",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option>'+data[i].subkategori_nama+'</option>';
                    }
                    $('.subkategori').html(html);
                     
                }
            });
        });
    });
</script>
</body>
</html>