function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('cep').value=("");
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
    
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);
        switch (conteudo.uf) {
            case uf = "RO":
                document.getElementById('estado').value="Rondônia"
                break;
            case uf = "AC":  
                document.getElementById('estado').value="Acre"
                break;
            case uf = "AM":  
                document.getElementById('estado').value="Amazonas"
                break;
            case uf = "RR":  
                document.getElementById('estado').value="Roraima"
                break;
            case uf = "PA":  
                document.getElementById('estado').value="Pará"
                break;
            case uf = "AP":  
                document.getElementById('estado').value="Amapá"
                break;
            case uf = "TO":  
                document.getElementById('estado').value="Tocantins"
                break;
            case uf = "MA":  
                document.getElementById('estado').value="Maranhão"
                break;
            case uf = "PI":  
                document.getElementById('estado').value="Piauí"
                break;
            case uf = "RN":  
                document.getElementById('estado').value="Rio Grande do Norte"
                break;
            case uf = "PB":  
                document.getElementById('estado').value="Paraíba"
                break;
            case uf = "PE":  
                document.getElementById('estado').value="Pernambuco"
                break;
            case uf = "AL":  
                document.getElementById('estado').value="Alagoas"
                break;
            case uf = "PA":  
                document.getElementById('estado').value="Pará"
                break;
            case uf = "SE":  
                document.getElementById('estado').value="Sergipe"
                break;
            case uf = "BA":  
                document.getElementById('estado').value="Bahia"
                break;
            case uf = "MG":  
                document.getElementById('estado').value="Minas Gerais"
                break;    
            case uf = "ES":  
                document.getElementById('estado').value="Espírito Santo"
                break;
            case uf = "RJ":  
                document.getElementById('estado').value="Rio de Janeiro"
                break;
            case uf = "SP":  
                document.getElementById('estado').value="São Paulo"
                break;
            case uf = "PR":  
                document.getElementById('estado').value="Paraná"
                break;
            case uf = "SC":  
                document.getElementById('estado').value="Santa Catarina"
                break;
            case uf = "RS":  
                document.getElementById('estado').value="Rio Grande do Sul"
                break;
            case uf = "MS":  
                document.getElementById('estado').value="Mato Grosso do Sul"
                break;
            case uf = "MT":  
                document.getElementById('estado').value="Mato Grosso"
                break;
            case uf = "GO":  
                document.getElementById('estado').value="Goiás"
                break;
            case uf = "DF":  
                document.getElementById('estado').value="Distrito Federal"
                break;


            default:
                break;
        }
        
    } //end if.
else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('rua').value="...";
        document.getElementById('bairro').value="...";
        document.getElementById('cidade').value="...";
        document.getElementById('uf').value="...";
        
        
        //Cria um elemento javascript.
        var script = document.createElement('script');
        
        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep é inválido.
        alert("Formato de CEP inválido.");
        limpa_formulário_cep();
    }
} //end if.
else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
}
};


function mascara(i){
    
    var v = i.value;
    
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
       i.value = v.substring(0, v.length-1);
       return;
    }
    
    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";

    
 }
 $(document).ready(function(){
            
    $("input[name='cpf']").blur(function(){
            
        var $nome_analista = $("input[name='nome']");
        var $nasc_analista = $("input[name='datanasc']");
        var $cep = $("input[name='cep']");
        var $endereco = $("input[name='rua']");
        var $numero = $("input[name='numero']");
        var $complemento = $("input[name='complemento']");
        var $bairro = $("input[name='bairro']");
        var $cidade = $("input[name='cidade']");
        var $estado = $("input[name='estado']");
        var $uf = $("input[name='uf']");

        $.getJSON('function.php',{
            cpf: $ (this).val().replace(/[^\d]/g, '')
        }, function(json){
            $nome_analista.val(json.nome);
            $nasc_analista.val(json.data_nasc);
            $cep.val(json.cep);
            $endereco.val(json.endereco);
            $numero.val(json.numero);
            $complemento.val(json.complemento);
            $bairro.val(json.bairro);
            $cidade.val(json.cidade);
            $estado.val(json.estado);
            $uf.val(json.uf);


        });
    });
});
