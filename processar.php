<?php

include 'conexao.php';

$titulo = $_POST['titulo'];
$metodologia = $_POST['METODOLOGIA'];
$referencias = $_POST['referencias'];
$nome_completo_avaliador = $_POST['nome_completo_avaliador'];
$CPF_COORDENADOR = $_POST['CPF_COORDENADOR'];
$EMAIL_COORDENADOR = $_POST['EMAIL_COORDENADOR'];
$TITULACAO_COORDENADOR = $_POST['TITULACAO_COORDENADOR'];
$TELEFONE_COORDENADOR = $_POST['TELEFONE_COORDENADOR'];
$COLEGIADO_COORDENADOR = $_POST['COLEGIADO_COORDENADOR'];
$CAMPUS_COORDENADOR = $_POST['CAMPUS_COORDENADOR'];
$MODALIDADE = $_POST['MODALIDADE'];
$ESTADO_ACAO = $_POST['ESTADO_ACAO'];
$CIDADE_ACAO = $_POST['CIDADE_ACAO'];
$ZONA_ACAO = $_POST['ZONA_ACAO'];
$BAIRRO_ACAO = $_POST['BAIRRO_ACAO'];
$RESUMO = $_POST['RESUMO'];
$INTRODUCAO = $_POST['INTRODUCAO'];
$JUSTIFICATIVA = $_POST['JUSTIFICATIVA'];
$OBJETIVOS_METAS = $_POST['OBJETIVOS_METAS'];
$RESULTADOS_ESPERADOS = $_POST['RESULTADOS_ESPERADOS'];
$ARTICULACAO_ENSINO = $_POST['ARTICULACAO_ENSINO'];
$INDICADORES_SISTEMATICA = $_POST['INDICADORES_SISTEMATICA'];
$PLANO_TRABALHO_COORDENADOR = $_POST['PLANO_TRABALHO_COORDENADOR'];
$PLANO_TRABALHO_DISCENTE = $_POST['PLANO_TRABALHO_DISCENTE'];
$RELACAO_SOCIEDADE = $_POST['RELACAO_SOCIEDADE'];
$PPC = $_POST['PPC'];
$ANUENCIA = $_POST['ANUENCIA'];
$ABRANGENCIA = $_POST['ABRANGENCIA'];
$VINCULO_LIGA = $_POST['VINCULO_LIGA'];
$VINCULO_EMPRESAJR = $_POST['VINCULO_EMPRESAJR'];
$BENEFICIA_GRUPOVUNERAVEL = $_POST['BENEFICIA_GRUPOVUNERAVEL'];
$APROVADA_FOMENTO_PUBLICO = $_POST['APROVADA_FOMENTO_PUBLICO'];
$PARCERIA_OUTRA_INSTITUICOES = $_POST['PARCERIA_OUTRA_INSTITUICOES'];

// Novos campos para o público-alvo e número de pessoas beneficiadas
$publico_interno_descricao = $_POST['publico_interno_descricao'];
$publico_interno_numero = $_POST['publico_interno_numero'];
$publico_externo_descricao = $_POST['publico_externo_descricao'];
$publico_externo_numero = $_POST['publico_externo_numero'];
$total_pessoas_beneficiadas = $_POST['total_pessoas_beneficiadas'];
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];
$carga_semanal = $_POST['carga_semanal'];
$carga_total = $_POST['carga_total'];

$sql = "INSERT INTO acoes_edital (
    titulo,
    METODOLOGIA,
    referencias,
    nome_completo_avaliador,
    CPF_COORDENADOR,
    EMAIL_COORDENADOR,
    TITULACAO_COORDENADOR,
    TELEFONE_COORDENADOR,
    COLEGIADO_COORDENADOR,
    CAMPUS_COORDENADOR,
    MODALIDADE,
    ESTADO_ACAO,
    CIDADE_ACAO,
    ZONA_ACAO,
    BAIRRO_ACAO,
    RESUMO,
    INTRODUCAO,
    JUSTIFICATIVA,
    OBJETIVOS_METAS,
    RESULTADOS_ESPERADOS,
    ARTICULACAO_ENSINO,
    INDICADORES_SISTEMATICA,
    PLANO_TRABALHO_COORDENADOR,
    PLANO_TRABALHO_DISCENTE,
    RELACAO_SOCIEDADE,
    PPC,
    ANUENCIA,
    ABRANGENCIA,
    VINCULO_LIGA,
    VINCULO_EMPRESAJR,
    BENEFICIA_GRUPOVUNERAVEL,
    APROVADA_FOMENTO_PUBLICO,
    PARCERIA_OUTRA_INSTITUICOES,
    publico_interno_descricao,
    publico_interno_numero,
    publico_externo_descricao,
    publico_externo_numero,
    total_pessoas_beneficiadas,
    inicio,
    fim,
    carga_semanal,
    carga_total
) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    // Verificar se houve um erro na preparação da consulta
    echo "Erro na preparação da consulta: " . $conn->error;
    exit;
}

$stmt->bind_param(
    "ssssssssssssssssssssssssssssssssssssssssii",
    $titulo,
    $metodologia,
    $referencias,
    $nome_completo_avaliador,
    $CPF_COORDENADOR,
    $EMAIL_COORDENADOR,
    $TITULACAO_COORDENADOR,
    $TELEFONE_COORDENADOR,
    $COLEGIADO_COORDENADOR,
    $CAMPUS_COORDENADOR,
    $MODALIDADE,
    $ESTADO_ACAO,
    $CIDADE_ACAO,
    $ZONA_ACAO,
    $BAIRRO_ACAO,
    $RESUMO,
    $INTRODUCAO,
    $JUSTIFICATIVA,
    $OBJETIVOS_METAS,
    $RESULTADOS_ESPERADOS,
    $ARTICULACAO_ENSINO,
    $INDICADORES_SISTEMATICA,
    $PLANO_TRABALHO_COORDENADOR,
    $PLANO_TRABALHO_DISCENTE,
    $RELACAO_SOCIEDADE,
    $PPC,
    $ANUENCIA,
    $ABRANGENCIA,
    $VINCULO_LIGA,
    $VINCULO_EMPRESAJR,
    $BENEFICIA_GRUPOVUNERAVEL,
    $APROVADA_FOMENTO_PUBLICO,
    $PARCERIA_OUTRA_INSTITUICOES,
    $publico_interno_descricao,
    $publico_interno_numero,
    $publico_externo_descricao,
    $publico_externo_numero,
    $total_pessoas_beneficiadas,
    $inicio,
    $fim,
    $carga_semanal,
    $carga_total
);

if ($stmt->execute()) {
    echo "<script>alert('Ação salva com sucesso.'); window.location.href = 'novaAcaoAvaliador.php';</script>";
    exit;
} else {
    echo "<script>alert('Erro ao salvar a ação: " . $stmt->error . "');</script>";
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();