<?php
// Este ficheiro pode ser guardado como index.php e executado num servidor com PHP.
// Não há processamento dinâmico necessário neste momento, mas a extensão PHP
// permite futura integração (ex.: preencher textos a partir de BD, i18n, etc.).
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Panfleto | Parceria AfriMoney & Messe Hotel da Huíla</title>
  <link rel="icon" href="image/favicon-16x16.png" type="image/x-icon">
  <style>
    :root{
      --brand-primary:#7e1fff; /* Africell vibra */
      --brand-secondary:#ff7a00;
      --brand-dark:#2a1746;
      --text:#1b1b1b;
      --muted:#5f5f6e;
      --bg:#fff9ff;
      --card:#ffffff;
      --ok:#16a34a;
      --accent:#f2ecff;
      --shadow: 0 8px 24px rgba(42,23,70,.12);

      /* extras para A4/marquee do original */
      --highlight:#ffd400;
      --ring: 0 0 0 3px rgba(126,31,255,.18);
      --accent-2:#fff3ea;
    }
    *{box-sizing:border-box}
    html,body{margin:0;padding:0;background:var(--bg);color:var(--text);font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell,"Helvetica Neue",Arial,sans-serif}

    /* Toolbar do original mantida (visual levemente integrado) */
    .toolbar{
      position:sticky; top:0; z-index:20; backdrop-filter:saturate(160%) blur(8px);
      background:linear-gradient(90deg, #ffffffdd, #fff4ffdd);
      border-bottom:1px solid #efe6ff; padding:10px; display:flex; gap:10px; justify-content:center; align-items:center; flex-wrap:wrap;
    }
    .toolbar .btn{
      padding:10px 16px; border-radius:12px; font-weight:800; border:1px solid #e6ddff; background:#fff; color:#5b3bc4; cursor:pointer; transition:.2s transform, .2s box-shadow;
      box-shadow:0 4px 14px rgba(126,31,255,.10)
    }
    .toolbar .btn.primary{background:var(--brand-primary); color:#fff; border-color:transparent; box-shadow:0 8px 20px rgba(126,31,255,.28)}
    .toolbar .btn:hover{transform:translateY(-1px); box-shadow:var(--ring)}
    .toolbar small{color:#6a6880}

    .wrap{
      max-width:960px;margin:auto; padding:20px;
    }
    .flyer{
      background:linear-gradient(180deg,#ffffff 0%, #faf6ff 100%);
      border-radius:20px; box-shadow:var(--shadow); overflow:hidden; border:1px solid #efe6ff;
    }
    .hero{
      display:grid; gap:16px; align-items:center;
      grid-template-columns: 1.1fr 0.9fr;
      padding:28px 22px;
      background:
        radial-gradient(1200px 300px at 20% -10%, #efe6ff 0%, transparent 60%),
        radial-gradient(800px 250px at 110% 10%, #ffe7d1 0%, transparent 60%),
        linear-gradient(135deg, #ffffff 0%, #fff5ff 100%);
      border-bottom:1px solid #efe6ff;
    }
    @media (max-width:820px){
      .hero{grid-template-columns:1fr; text-align:center}
    }
    .badge{
      display:inline-flex; align-items:center; gap:8px;
      background:var(--accent); color:var(--brand-dark);
      padding:6px 10px; border-radius:999px; font-weight:600; font-size:12px;
      border:1px solid #e6ddff;
    }
    .title{
      font-size: clamp(24px, 4.2vw, 40px);
      line-height:1.1; margin:10px 0 8px; color:var(--brand-dark); font-weight:800;
      letter-spacing:-0.02em;
    }
    .subtitle{
      color:var(--muted); font-size: clamp(14px,2.2vw,16px); margin:0;
    }
    .logos{
      display:flex; gap:12px; align-items:center; justify-content:flex-end;
    }
    @media (max-width:820px){ .logos{justify-content:center} }
    .logo{
      display:flex; align-items:center; justify-content:center;
      width:120px; height:56px; border-radius:12px; background:#fff; border:1px solid #eee; box-shadow:0 2px 10px rgba(0,0,0,.04);
      font-weight:800; color:var(--brand-primary); user-select:none;
    }
    .logo.secondary{ color:#ff7a00 }

    /* Marquee do original, mantido */
    .marquee{
      position:relative; overflow:hidden; border:1px solid #efe6ff; border-radius:14px;
      background:#ffffffaa; backdrop-filter:saturate(140%) blur(2px); padding:12px 14px; min-height:56px;
      box-shadow:0 6px 18px rgba(31,15,58,.06); margin-top:14px;
    }
    .marquee-item{
      position:absolute; inset:0; display:flex; align-items:center; justify-content:center; text-align:center;
      padding:10px; opacity:0; transform:translateY(8px) scale(.98);
      transition:opacity .45s ease, transform .45s ease;
      font-weight:800; color:#2a1a55;
    }
    .marquee-item.show{ opacity:1; transform:translateY(0) scale(1) }
    .marquee .chip{
      display:inline-flex; align-items:center; gap:8px; padding:6px 10px; border-radius:999px; margin-right:8px;
      background:#f4f0ff; color:#5b3bc4; border:1px solid #e6ddff; font-size:12px; font-weight:900;
    }
    .marquee .text{ font-size:14px; color:#2b233a; font-weight:700 }

    .grid{
      display:grid; gap:16px; padding:20px;
      grid-template-columns: repeat(12, 1fr);
      align-items:stretch;
    }
    .card{
      background:var(--card); border:1px solid #efe6ff; border-radius:16px; padding:16px;
      box-shadow:0 4px 16px rgba(42,23,70,.06);
      height:100%;
      display:flex; flex-direction:column;
    }
    .card h3{ margin:0 0 8px; color:var(--brand-dark); font-size:18px }
    .card p{ margin:0 0 8px; color:var(--text); font-size:14px }
    .list{ margin:6px 0 0; padding-left:18px }
    .list li{ margin:6px 0; color:#2c2c35; font-size:14px }
    .tag{
      display:inline-block; font-size:11px; font-weight:700; color:#6d5abf;
      background:#f4f1ff; border:1px solid #e6ddff; padding:3px 8px; border-radius:999px; margin-right:6px
    }
    .kpi{
      display:flex; gap:10px; align-items:center; font-weight:700; color:var(--brand-dark);
      background:#faf7ff; border:1px dashed #e6ddff; padding:10px 12px; border-radius:12px; font-size:13px
    }
    .pill{
      display:inline-flex; align-items:center; gap:6px; padding:6px 10px; border-radius:999px;
      font-size:12px; border:1px solid #e6ddff; background:#ffffff; color:#5c4a9b; font-weight:600
    }
    .cta{
      display:flex; flex-wrap:wrap; gap:10px; align-items:center; justify-content:center;
      padding:18px; background:linear-gradient(90deg,#f7f2ff, #fff3ea); border-top:1px solid #efe6ff;
    }
    .btn{
      border:none; border-radius:12px; padding:12px 16px; font-weight:800; cursor:pointer;
      background:var(--brand-primary); color:#fff; box-shadow:0 6px 18px rgba(126,31,255,.25);
      transition: .2s transform, .2s filter;
    }
    .btn:hover{ transform: translateY(-1px); filter:saturate(108%) }
    .btn.secondary{
      background:#ffffff; color:var(--brand-primary); border:1px solid #e6ddff; box-shadow:none;
    }

    /* Colunas conforme o style fornecido */
    .col-7{grid-column: span 7}
    .col-5{grid-column: span 5}
    .col-6{grid-column: span 6}
    .col-4{grid-column: span 4}
    .col-8{grid-column: span 8}
    .col-12{grid-column: span 12}
    @media (max-width:820px){
      .col-7,.col-5,.col-6,.col-4,.col-8,.col-12{grid-column:1/-1}
    }

    /* Tabela no estilo fornecido */
    .table{
      width:100%; border-collapse:separate; border-spacing:0; overflow:hidden; border-radius:12px; border:1px solid #efe6ff;
      background:#fff; font-size:14px
    }
    .table thead th{
      background:#faf7ff; color:#4b3a88; text-align:left; padding:10px; border-bottom:1px solid #efe6ff; font-weight:700
    }
    .table td{
      padding:10px; border-bottom:1px solid #f3edff; color:#2b2b33
    }
    .table tr:last-child td{ border-bottom:none }

    /* Rodapé */
    .footnote{
      font-size:12px; color:#5b5869; text-align:center; padding:14px 16px;
    }

    /* Documento A4 do original (mantido para impressão/PDF) */
    .a4-container{ display:none; }
    .a4-page{
      width:210mm; height:297mm;
      background:#ffffff; color:#1c1233;
      padding:14mm 14mm 16mm;
      box-shadow:0 6px 20px rgba(0,0,0,.12);
      margin:auto;
    }
    .a4-header h1{margin:0 0 2mm; font-size:20pt; color:#2a145a}
    .a4-header p{margin:0; color:#4b3e65}
    .a4-chip{display:inline-block; font-size:9pt; padding:3px 8px; border-radius:999px; background:#efe7ff; color:#2a145a; border:1px solid #e6ddff; font-weight:800}
    .a4-grid{display:grid; gap:8mm; grid-template-columns: 1fr 1fr}
    .a4-card{
      border:1px solid #e8e3fa; border-radius:8px; padding:6mm; background:#ffffff;
      box-shadow:0 3mm 10mm rgba(108,43,217,.06);
    }
    .a4-card h3{margin:0 0 2mm; font-size:13pt; color:#2a145a}
    .a4-card ul{margin:0; padding-left:5mm}
    .a4-card li{margin:1.5mm 0; font-size:10.5pt}
    .a4-table{width:100%; border-collapse:collapse; font-size:10.5pt}
    .a4-table th,.a4-table td{border:1px solid #eee8ff; padding:3mm; text-align:left}
    .a4-table thead th{background:#f4efff; color:#3a2b6b; font-weight:800}
    .a4-footer{margin-top:6mm; font-size:9pt; color:#534a6e}

    /* Impressão */
    @page{ size: A4 portrait; margin: 10mm 10mm 12mm 10mm; }
    @media print{
      body{background:#fff}
      .wrap, .flyer, .cta, .toolbar{display:none !important}
      .a4-container{display:block !important}
      .a4-page{box-shadow:none; margin:0; page-break-after:always}
    }
  </style>
</head>
<body>
  <!-- Barra de ações do original (mantida) -->
  <div class="toolbar" role="region" aria-label="Ferramentas">
    <button class="btn primary" id="btnPrintA4">Gerar panfleto A4 para impressão</button>
    <button class="btn secondary" id="btnPreview">Pré-visualizar A4</button>
    <button class="btn" id="btnPDF" style="background:linear-gradient(90deg,#16a34a,#22c55e); color:#fff; border:0">Gerar PDF</button>
    <small>Dica: margens “Padrão” e escala 100% no diálogo de impressão.</small>
  </div>

  <div class="wrap">
    <section class="flyer" role="article" aria-label="Panfleto Parceria AfriMoney e Messe Hotel da Huíla">
      <div class="hero">
        <div>
          <span class="badge">Parceria Estratégica</span>
          <h1 class="title">Africell Angola (AfriMoney) + Messe Hotel da Huíla</h1>
          <p class="subtitle">Digitalização de pagamentos, levantamentos e transferências no hotel -- mais comodidade para hóspedes e segurança no manuseio de valores.</p>

          <!-- Marquee mantida e integrada -->
          <div class="marquee" id="marquee" aria-live="polite" aria-atomic="true"></div>
        </div>
        <div class="logos" aria-label="Logotipos">
          <div class="logo" id="btnAfriMoney" role="button" aria-pressed="false" tabindex="0" aria-label="Mostrar destaques AfriMoney">AfriMoney</div>
          <div class="logo secondary" id="btnMesse" role="button" aria-pressed="false" tabindex="0" aria-label="Mostrar destaques Messe Huíla">Messe Huíla</div>
        </div>
      </div>

      <div class="grid">
        <!-- Objetivo -->
        <div class="card col-7">
          <h3>1. Objetivo da Parceria</h3>
          <p>Facilitar e digitalizar operações financeiras dentro da Messe Hotel da Huíla, integrando AfriMoney como método oficial de pagamento.</p>
          <div class="kpi" aria-label="Acesso rápido">
            <span class="pill">USSD: #777#</span>
            <span class="pill">App AfriMoney</span>
            <span class="pill">Disponível 24h</span>
          </div>
        </div>

        <!-- Valor -->
        <div class="card col-5">
          <h3>2. Proposta de Valor</h3>
          <p><span class="tag">Para o Hotel</span></p>
          <ul class="list">
            <li>Redução de circulação de dinheiro físico.</li>
            <li>Pagamentos fáceis para reservas, alojamento, piscina e salão de festas.</li>
            <li>AfriMoney como método de pagamento oficial.</li>
            <li>Possibilidade de ponto Agente AfriMoney (levantar/depositar).</li>
          </ul>
          <p style="margin-top:10px"><span class="tag">Para a Africell</span></p>
          <ul class="list">
            <li>Acesso a clientes do setor hoteleiro e militar.</li>
            <li>Expansão da rede de agentes com base estável.</li>
            <li>Fortalecimento da marca em turismo, hotelaria e defesa.</li>
          </ul>
        </div>

        <!-- Serviços -->
        <div class="card col-8">
          <h3>3. Serviços na Messe via AfriMoney</h3>
          <table class="table" role="table" aria-label="Serviços AfriMoney">
            <thead>
              <tr>
                <th style="width:220px">Serviço</th>
                <th>Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Pagamento Digital</td>
                <td>Hóspedes pagam com AfriMoney ao reservar ou consumir serviços no hotel.</td>
              </tr>
              <tr>
                <td>Levantamentos no Hotel</td>
                <td>Hóspedes e funcionários podem levantar dinheiro através de Agente local.</td>
              </tr>
              <tr>
                <td>Depósitos e Transferências</td>
                <td>Funcionários e clientes realizam operações financeiras no local.</td>
              </tr>
              <tr>
                <td>Consulta de Saldo e Histórico</td>
                <td>Acesso ao extrato diretamente via USSD no hotel.</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Implementação Técnica -->
        <div class="card col-4">
          <h3>4. Implementação Técnica</h3>
          <ul class="list">
            <li>Ponto AfriMoney no balcão da recepção.</li>
            <li>Treinamento da equipa do hotel como agentes certificados.</li>
            <li>Divulgação em Wi‑Fi, piscina, quartos e eventos.</li>
            <li>Acesso rápido via USSD ou App: #777#.</li>
          </ul>
        </div>

        <!-- Modelo de Receita -->
        <div class="card col-6">
          <h3>5. Modelo de Receita</h3>
          <ul class="list">
            <li>Hotel: comissões por levantamentos, depósitos, recargas e operações.</li>
            <li>Africell: aumento de volume transacional e aquisição de clientes.</li>
            <li>Partilha de receitas conforme contrato de agente/empresa.</li>
          </ul>
        </div>

        <!-- Benefícios para Clientes -->
        <div class="card col-6">
          <h3>6. Benefícios para os Clientes</h3>
          <ul class="list">
            <li>Sem necessidade de dinheiro físico.</li>
            <li>Transações rápidas e seguras.</li>
            <li>Disponível 24h/dia com terminal móvel.</li>
            <li>Funciona em qualquer telemóvel.</li>
          </ul>
        </div>

        <!-- Funcionalidades Avançadas -->
        <div class="card col-7">
          <h3>7. Funcionalidades Avançadas</h3>
          <ul class="list">
            <li>Receber transferências para reservas, eventos e serviços.</li>
            <li>Efetuar reembolsos em caso de cancelamentos.</li>
            <li>Vender recargas telefónicas com comissionamento.</li>
            <li>Ativar contas AfriMoney para hóspedes no local.</li>
            <li>Integração com Showsoft-System para registo e automação.</li>
          </ul>
        </div>

        <!-- Divulgação -->
        <div class="card col-5">
          <h3>8. Estratégia de Divulgação</h3>
          <ul class="list">
            <li>Cartazes: “Aceitamos AfriMoney aqui!”.</li>
            <li>QR Codes nas mesas e balcão para transferências rápidas.</li>
            <li>Equipa treinada como Agente AfriMoney oficial.</li>
            <li>Panfletos nos quartos e na recepção com instruções de uso.</li>
          </ul>
        </div>

        <!-- Ação Imediata -->
        <div class="card col-12">
          <h3>9. Ação Imediata</h3>
          <ul class="list">
            <li>Assinatura do protocolo entre Africell e Direção da Messe.</li>
            <li>Instalação do ponto AfriMoney e treinamento dos atendentes.</li>
            <li>Campanha de lançamento com bónus para primeiros utilizadores.</li>
          </ul>
          <div style="margin-top:6px; font-weight:800; color:#3b2a00">
            Ligue já • USSD: <span style="background:var(--highlight); padding:2px 6px; border-radius:6px">#777#</span>
          </div>
        </div>
      </div>

      <div class="cta" role="region" aria-label="Call to action">
        <button class="btn" style="background:linear-gradient(90deg,#ff7a00,#ff9a3a)">Comece hoje: #777#</button>
        <button class="btn secondary">Fale com o Comercial Africell</button>
      </div>

      <div class="footnote">
        AfriMoney é um serviço da Africell Angola S.A. | Messe Hotel da Huíla -- Todos os direitos reservados.
      </div>
    </section>
  </div>

  <!-- Documento A4 para impressão (mantido com conteúdo equivalente) -->
  <div class="a4-container" id="a4Container" aria-hidden="true">
    <section class="a4-page" id="a4Page" role="document" aria-label="Panfleto A4 para impressão">
      <div class="a4-header">
        <span class="a4-chip">Parceria Estratégica</span>
        <h1>Africell Angola (AfriMoney) + Messe Hotel da Huíla</h1>
        <p>Digitalização de pagamentos, levantamentos e transferências no hotel -- comodidade e segurança.</p>
      </div>

      <div class="a4-grid" style="margin-top:6mm">
        <div class="a4-card" style="grid-column:1 / -1; background:linear-gradient(90deg,#ffffff,#f7f2ff); border-color:#e6ddff">
          <h3>1. Objetivo</h3>
          <p>Integrar AfriMoney como método oficial de pagamento na Messe Hotel da Huíla, simplificando operações financeiras no local.</p>
          <p style="margin:2mm 0 0"><strong>USSD:</strong> #777# • <strong>App AfriMoney</strong> • <strong>Disponível 24h</strong></p>
        </div>

        <div class="a4-card">
          <h3>2. Valor para o Hotel</h3>
          <ul>
            <li>Menos circulação de dinheiro físico.</li>
            <li>Pagamentos para reservas, alojamento, piscina e salão.</li>
            <li>Ponto Agente AfriMoney (levantar/depositar).</li>
          </ul>
        </div>
        <div class="a4-card">
          <h3>2. Valor para a Africell</h3>
          <ul>
            <li>Acesso a clientes do setor hoteleiro e militar.</li>
            <li>Expansão da rede de agentes.</li>
            <li>Marca forte em turismo, hotelaria e defesa.</li>
          </ul>
        </div>

        <div class="a4-card" style="grid-column:1 / -1">
          <h3>3. Serviços na Messe via AfriMoney</h3>
          <table class="a4-table">
            <thead>
              <tr><th style="width:45%">Serviço</th><th>Descrição</th></tr>
            </thead>
            <tbody>
              <tr><td>Pagamento Digital</td><td>Pagamentos de reservas e consumos no hotel.</td></tr>
              <tr><td>Levantamentos no Hotel</td><td>Levantamentos via Agente local para hóspedes e funcionários.</td></tr>
              <tr><td>Depósitos e Transferências</td><td>Operações financeiras rápidas no local.</td></tr>
              <tr><td>Consulta de Saldo e Histórico</td><td>Extrato via USSD diretamente no hotel.</td></tr>
            </tbody>
          </table>
        </div>

        <div class="a4-card">
          <h3>4. Implementação Técnica</h3>
          <ul>
            <li>Ponto AfriMoney na recepção.</li>
            <li>Equipa certificada como agentes.</li>
            <li>Divulgação em Wi‑Fi, piscina, quartos e eventos.</li>
            <li>Acesso via USSD/App: #777#.</li>
          </ul>
        </div>

        <div class="a4-card">
          <h3>5. Modelo de Receita</h3>
          <ul>
            <li>Hotel: comissões por operações e recargas.</li>
            <li>Africell: aumento de transações e clientes.</li>
            <li>Partilha conforme contrato de agente.</li>
          </ul>
        </div>

        <div class="a4-card">
          <h3>6. Benefícios para Clientes</h3>
          <ul>
            <li>Sem dinheiro físico.</li>
            <li>Rápido e seguro.</li>
            <li>Disponível 24h/dia.</li>
            <li>Funciona em qualquer telemóvel.</li>
          </ul>
        </div>

        <div class="a4-card">
          <h3>7. Funcionalidades Avançadas</h3>
          <ul>
            <li>Recebimentos para reservas, eventos e serviços.</li>
            <li>Reembolsos de cancelamentos.</li>
            <li>Venda de recargas com comissão.</li>
            <li>Ativação de contas AfriMoney no local.</li>
            <li>Integração com Showsoft-System.</li>
          </ul>
        </div>

        <div class="a4-card" style="grid-column:1 / -1; background:linear-gradient(90deg,#fffef2,#fff); border-color:#ffe8a3">
          <h3>8. Ação Imediata</h3>
          <ul>
            <li>Assinatura de protocolo (Africell x Direção Messe).</li>
            <li>Instalação do ponto e formação.</li>
            <li>Campanha de lançamento com bónus.</li>
          </ul>
          <p class="a4-footer"><strong>Contacto:</strong> Comercial Africell | <strong>USSD:</strong> #777#</p>
        </div>
      </div>
    </section>
  </div>

  <script>
    // Controles A4/PDF preservados
    const a4Container = document.getElementById('a4Container');
    const btnPrintA4 = document.getElementById('btnPrintA4');
    const btnPreview = document.getElementById('btnPreview');

    btnPreview.addEventListener('click', () => {
      const isVisible = a4Container.style.display === 'block';
      a4Container.style.display = isVisible ? 'none' : 'block';
      a4Container.setAttribute('aria-hidden', isVisible ? 'true' : 'false');
      if (!isVisible) a4Container.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });

    btnPrintA4.addEventListener('click', () => {
      const previousDisplay = a4Container.style.display;
      a4Container.style.display = 'block';
      a4Container.setAttribute('aria-hidden', 'false');
      requestAnimationFrame(() => {
        setTimeout(() => {
          window.print();
          a4Container.style.display = previousDisplay || 'none';
          a4Container.setAttribute('aria-hidden', a4Container.style.display === 'none' ? 'true' : 'false');
        }, 100);
      });
    });

    const btnPDF = document.getElementById('btnPDF');
    function openPrintForPDF() {
      const prev = a4Container.style.display;
      a4Container.style.display = 'block';
      a4Container.setAttribute('aria-hidden', 'false');
      const page = document.getElementById('a4Page');
      page.setAttribute('tabindex', '-1');
      page.focus({ preventScroll: true });
      requestAnimationFrame(() => {
        setTimeout(() => {
          window.print();
          a4Container.style.display = prev || 'none';
          a4Container.setAttribute('aria-hidden', a4Container.style.display === 'none' ? 'true' : 'false');
        }, 120);
      });
    }
    btnPDF.addEventListener('click', openPrintForPDF);

    // Marquee com alternância (mantido)
    const marquee = document.getElementById('marquee');
    const btnAfriMoney = document.getElementById('btnAfriMoney');
    const btnMesse = document.getElementById('btnMesse');

    const slides = {
      afrimoney: [
        { chip:'Objetivo', text:'Digitalizar pagamentos na Messe com AfriMoney como método oficial.' },
        { chip:'Proposta', text:'Menos dinheiro físico + pagamentos para reservas, alojamento e serviços.' },
        { chip:'Serviços', text:'Pagamentos, levantamentos, depósitos, transferências e consulta de saldo.' },
        { chip:'Descrição', text:'USSD #777#, App AfriMoney e terminal móvel 24h no local.' },
        { chip:'Implementação', text:'Ponto AfriMoney na recepção e equipa certificada como agente.' },
        { chip:'Receita', text:'Comissões por operações e recargas; mais transações para a Africell.' },
        { chip:'Avançadas', text:'Reembolsos, ativação de contas, integração Showsoft-System.' },
        { chip:'Divulgação', text:'Cartazes, QR Codes e comunicação em Wi‑Fi, piscina e quartos.' }
      ],
      messe: [
        { chip:'Objetivo', text:'Simplificar operações financeiras para hóspedes e equipa da Messe.' },
        { chip:'Proposta', text:'Mais comodidade, segurança e rapidez nas transações do hotel.' },
        { chip:'Serviços', text:'Pagar reservas/consumos, levantar e depositar no próprio hotel.' },
        { chip:'Descrição', text:'Atendimento local, sem necessidade de dinheiro físico.' },
        { chip:'Implementação', text:'Treino da equipa, ponto de atendimento visível e comunicação interna.' },
        { chip:'Receita', text:'Comissões ao hotel por operações e recargas realizadas no ponto.' },
        { chip:'Benefícios', text:'Disponível 24h/dia, funciona em qualquer telemóvel (USSD #777#).' },
        { chip:'Ação', text:'Lançamento com bónus para primeiros utilizadores e campanha no local.' }
      ]
    };

    let ticker = null;
    let activeKey = null;
    let index = 0;
    const INTERVALO = 3500;

    function renderSlide(item){
      const prev = marquee.querySelector('.marquee-item.show');
      const el = document.createElement('div');
      el.className = 'marquee-item';
      el.innerHTML = `
        <span class="chip">${item.chip}</span>
        <span class="text">${item.text}</span>
      `;
      marquee.appendChild(el);
      requestAnimationFrame(() => {
        el.classList.add('show');
        if (prev){
          prev.classList.remove('show');
          setTimeout(() => prev.remove(), 460);
        }
      });
    }

    function startCycle(key){
      if (activeKey === key) return;
      activeKey = key;
      index = 0;
      marquee.innerHTML = '';
      renderSlide(slides[key][index]);
      if (ticker) clearInterval(ticker);
      ticker = setInterval(() => {
        index = (index + 1) % slides[key].length;
        renderSlide(slides[key][index]);
      }, INTERVALO);
      btnAfriMoney.setAttribute('aria-pressed', key === 'afrimoney' ? 'true' : 'false');
      btnMesse.setAttribute('aria-pressed', key === 'messe' ? 'true' : 'false');
    }

    function stopCycle(){
      if (ticker) clearInterval(ticker);
      ticker = null;
      activeKey = null;
      btnAfriMoney.setAttribute('aria-pressed','false');
      btnMesse.setAttribute('aria-pressed','false');
    }

    function setupToggle(el, key){
      el.addEventListener('click', () => {
        if (activeKey === key){
          stopCycle();
          marquee.innerHTML = '';
        } else {
          startCycle(key);
        }
      });
      el.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          el.click();
        }
      });
    }

    setupToggle(btnAfriMoney, 'afrimoney');
    setupToggle(btnMesse, 'messe');

    // startCycle('afrimoney'); // opcional
  </script>
</body>
</html>