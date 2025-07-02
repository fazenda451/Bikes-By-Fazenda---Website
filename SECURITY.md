# Security Policy

## Supported Versions

Use this section to tell people about which versions of your project are
currently being supported with security updates.

| Version | Supported          |
| ------- | ------------------ |
| 5.1.x   | :white_check_mark: |
| 5.0.x   | :x:                |
| 4.0.x   | :white_check_mark: |
| < 4.0   | :x:                |

## Reporting a Vulnerability

Use this section to tell people how to report a vulnerability.

Tell them where to go, how often they can expect to get an update on a
reported vulnerability, what to expect if the vulnerability is accepted or
declined, etc.

# Segurança e Mitigações

## Alerta: Incomplete string escaping or encoding (Chart.js)

O repositório recebeu um alerta de segurança relacionado com incomplete string escaping no ficheiro:

```
public/admincss/vendor/chart.js/Chart.bundle.js
```

### Origem do alerta
- Este ficheiro faz parte da biblioteca **Chart.js**, uma dependência de terceiros, minificada e não mantida diretamente por este projeto.
- O alerta é gerado por uma função de substituição de caracteres que pode não escapar todas as ocorrências, potencialmente permitindo ataques XSS se dados não confiáveis forem usados.

### Mitigação aplicada
- **Não alteramos ficheiros de dependências minificadas manualmente.**
- **Recomendamos sempre atualizar para a versão mais recente do Chart.js** assim que disponível.
- **Nunca passar dados não sanitizados do utilizador diretamente para Chart.js**. Todos os dados provenientes do utilizador devem ser validados e sanitizados antes de serem usados em gráficos.
- Se necessário, usar bibliotecas de sanitização como DOMPurify para HTML ou funções de escape para JS.

### Ação futura
- Monitorizar novas versões do Chart.js e atualizar sempre que possível.
- Se o alerta persistir e for crítico para o contexto do projeto, considerar alternativas ou contactar os autores da biblioteca.

---

**Resumo:**
- O alerta não afeta diretamente o código de negócio do projeto.
- A responsabilidade da correção é dos autores do Chart.js.
- O projeto segue boas práticas de sanitização e atualização de dependências.
