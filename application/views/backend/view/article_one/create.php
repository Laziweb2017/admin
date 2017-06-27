<?=$this->data_view['breadcrumb']?>
<?
    $data['detail'] = isset($data['detail'])?$data['detail']:null;
    $data['detail'] = $data['detail'];
    $alias = return_valueKey($this->_template['typeCategory'],'id','article_one','alias'); 
    $alias_link['vi'] = base_url().$alias;
    $alias_link['en'] = base_url().'en/'.$alias;

    $alias_readOnly = false;
    if($this->data['user']['id_role'] != 1){
        $alias_readOnly = true;
    }
?>
<form id="form-submit" class="form-horizontal" action="<?=$this->_table?>/action"
      method="post" onsubmit="form_submit_check_validation('submit');return false;">
    
    <input type="hidden" name="type_action" value="<?=$data['detail']['id']!=null?'edit':'create'?>" />
    <input type="hidden" name="id" value="<?=$data['detail']['id']?>" />
    <input type="hidden" name="set_alias" value="<?=$this->data_view['dataCreate']['alias']==false?'false':'true'?>" />
    <div class="row">
        <div class="col-md-8">
            <div class="portlet light bordered">
                <?
                    $info_tab = array(
                        array('id'=>1,'title'=>'Tiếng Việt'),
                        array('id'=>2,'title'=>'Tiếng Anh'),
                    );
                    create_tab('Thông tin',false,$info_tab);
                ?>
                <div class="portlet-body form">
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_tab_1">
                            <div class="form-body">
                                <?
                                    create_input('title',lang('title'),$data['detail']['title']);
                                    create_input_addon('alias',lang('alias'),$alias_link['vi'],$data['detail']['alias'],true,30,null,2,$alias_readOnly);
                                    create_textarea('desc',lang('desc'),$data['detail']['desc']);
                                    create_editor('content',lang('content'),$data['detail']['content']);
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="portlet_tab_2">
                            <div class="form-body">
                                 <?
                                    create_input('en_title',lang('title'),$data['detail']['en_title']);
                                    create_input_addon('en_alias',lang('alias'),$alias_link['en'],$data['detail']['en_alias']);
                                    create_textarea('en_desc',lang('desc'),$data['detail']['en_desc']);
                                    create_editor('en_content',lang('content'),$data['detail']['en_content']);
                                 ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?
                $this->load->view($this->_base_view_path.'view/include/action/seo',$data);
            ?>
        </div>
        <div class="col-md-4">
            <div class="portlet light bordered">
            <?
                create_tab('Danh mục & trạng thái');
            ?>
            <div class="portlet-body form">
                <div class="form-body">
                    <?
                        create_checkbox('is_active',lang('is_active'),1,$data['detail']!=null?$data['detail']['is_active']:1,false,null,4);
                    ?>
                </div>
            </div>
        </div>
        <?
            //$this->load->view($this->_base_view_path.'view/include/action/tag',$data);
            $this->load->view($this->_base_view_path.'view/include/action/action',$data);
        ?>
        </div>
    </div>
</form>
