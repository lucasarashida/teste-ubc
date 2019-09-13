<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">

const remove = (element) => {
    console.log(element);
    $(element).parents('.form-group').remove();
    // adiciona dois input para que seja passado ao banco um valor em branco quando o telefone é excluído através do botão
    let html = '<input type=hidden name="telefone" value=""><input type="hidden" name="tipo_tel" value="">'; 
    $('#telefones').append(html);
}

const adicionaTelefone = (type) => {
    let telefoneTemplate = document.querySelector('template#telefone').innerHTML;
    let html = telefoneTemplate.replace(/{{tipoTelefone}}/g, type);
    $('#telefones').append(html);
};

$('.addTel').click( event => {
    event.preventDefault();
    adicionaTelefone(event.target.innerHTML);
    $('.removerTelefone').click(event => {
        event.preventDefault();
        remove(event.target);
    });
})

// com o mesmo objetivo da 'adicionaTelefone', porém essa será executada somente para gerar o template com o input já preenchido com o dado salvo (3/3)
const editaTelefone = (type) => {
    let editaTelefoneTemplate = document.querySelector('template#editaTelefone').innerHTML;
    let html = editaTelefoneTemplate.replace(/{{tipoTelefone}}/g, type);
    $('#telefones').append(html);
};

// após o click, executa esse evento (2/3)
$('.editaTel').click( event => {
    event.preventDefault();
    editaTelefone(event.target.innerHTML);
    $('.removerTelefone').click(event => {
        event.preventDefault();
        remove(event.target);
    });
})

$(document).ready(function(){
    $('#cpf').mask('000.000.000-00'); // mascara para o campo de cpf
    $('#showTel').trigger('click'); // simula um click na âncora (id="showTel") na página de edição (1/3)
})

// Se os checkbox "Também sou um Professor/Aluno" foi marcada, exibe o select de titulo ou de curso
$('[name="flgProf"]').on('change', function(){
    $('#showTitulo').toggle(this.checked);
}).change();

$('[name="flgAluno"]').on('change', function(){
    $('#showCurso').toggle(this.checked);
}).change();

</script>