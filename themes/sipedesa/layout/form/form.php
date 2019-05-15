<div class="row">
    <div class="col-md-12">
        
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i> Form
                </div>
							
            </div>
            <div class="portlet-body form">
                
                <form class="form-horizontal" role="form" name="{FORM_ID}" id="{FORM_ID}">
			<div class="form-body">
                                {FORM_FIELDS}
				<div class="form-group {IS_HIDDEN}">
                                    <label class="col-md-2 control-label">{label}</label>
                                    <div class="col-md-10">
					{format}
					<span class="help-block hide">
                                            A block of help text.
                                        </span>
                                    </div>
				</div>
                                {/FORM_FIELDS}
                        </div>    
                        <div class="form-actions right">
                            
                            <button type="button" class="btn default">Batal</button>
                            <button type="submit" class="btn blue btn-simpan">Simpan</button>
                            <button type="submit" class="btn blue btn-ubah">Ubah</button>
			</div>
                </form>    
            </div>
        </div>
    </div>
</div>
