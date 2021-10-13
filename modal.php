<div class= "modal fade" id= "myModalempresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class= "modal-dialog" role="docment">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aira-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Empresa</h4>
                            </div>
                            <div class="modal-body">
                                <form method= "POST" action= {{route('empresas.store')}} enctype= "multipart/form-data">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nome</label>
                                        <input name="nome" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">CNPJ</label>
                                        <input name="cnpj" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">UF</label>
                                        <input name="uf" type="text" class="form-control">
                                    </div>
                                    <input name="id" type="hidden" id="id_empresa">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Cadastrar</button>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div> 