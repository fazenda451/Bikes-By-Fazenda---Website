# Sistema de Cookies - Bikes By Fazenda

## 📋 Visão Geral

Sistema completo de gestão de cookies compatível com GDPR/LGPD, incluindo:
- Banner de consentimento
- Modal de preferências detalhadas  
- Botão flutuante para gerir cookies
- Armazenamento de preferências
- Carregamento condicional de scripts

## 🚀 Funcionalidades

### ✅ **Banner de Cookies**
- Aparece automaticamente para novos visitantes
- 3 opções: Accept All, Manage Preferences, Reject All
- Design responsivo e moderno
- Animações suaves

### ⚙️ **Modal de Preferências**  
- 4 categorias de cookies:
  - **Essential** (sempre ativo)
  - **Analytics** (Google Analytics)
  - **Marketing** (Facebook Pixel, etc.)
  - **Functional** (Chat widgets, etc.)
- Toggle switches para cada categoria
- Descrições claras de cada tipo

### 🔄 **Gestão Contínua**
- Botão flutuante sempre visível
- Link no footer para alterar preferências
- Função global `manageCookies()` disponível

## 🛠️ Instalação

O sistema já está instalado e configurado nos seguintes layouts:

```php
// Layout principal
resources/views/layouts/app.blade.php

// Layout para guests
resources/views/layouts/guest.blade.php  

// Página home
resources/views/home/index.blade.php

// Footer (link de gestão)
resources/views/home/footer.blade.php
```

## ⚡ Como Usar

### **Para Desenvolvedores**

```javascript
// Verificar se um tipo de cookie está permitido
if (isCookieAllowed('analytics')) {
    // Carregar Google Analytics
}

if (isCookieAllowed('marketing')) {
    // Carregar Facebook Pixel
}

// Abrir modal de gestão de cookies
manageCookies();
```

### **Configuração do Google Analytics**

Editar o ficheiro `resources/views/components/cookie-banner.blade.php`:

```javascript
// Linha ~332 - Substituir pelo seu ID real
const GA_ID = 'G-XXXXXXXXXX'; // Seu Google Analytics ID
```

### **Adicionar Scripts Personalizados**

```javascript
// No método loadMarketingScripts() - linha ~343
loadMarketingScripts: function() {
    // Facebook Pixel
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', 'YOUR_PIXEL_ID');
    fbq('track', 'PageView');
},

// No método loadFunctionalScripts() - linha ~348  
loadFunctionalScripts: function() {
    // Intercom, Zendesk, etc.
    // Adicionar seus scripts aqui
}
```

## 📱 Design Responsivo

### **Desktop**
- Banner na parte inferior
- Modal centrado
- Botão flutuante canto inferior esquerdo

### **Mobile**  
- Banner em tela cheia
- Botões empilhados
- Botão flutuante canto inferior direito
- Modal adaptativo

## 🎨 Personalização

### **Cores**
O sistema usa as cores do site:
- Primária: `#9935dc`
- Secundária: `#8024c0`
- Gradientes automáticos

### **Textos**
Facilmente editáveis no componente:
```html
<!-- resources/views/components/cookie-banner.blade.php -->
<h4>Cookie Preferences</h4>
<p>We use cookies to enhance your browsing experience...</p>
```

## 🔒 Conformidade Legal

### **GDPR (Europa)**
✅ Consentimento explícito  
✅ Opt-in por categoria  
✅ Fácil retirada de consentimento  
✅ Informações claras sobre uso  

### **LGPD (Brasil)**  
✅ Base legal para tratamento  
✅ Finalidades específicas  
✅ Direito de revogação  
✅ Transparência no processamento  

## 📊 Cookies Armazenados

| Cookie | Duração | Propósito |
|--------|---------|-----------|
| `bikes_fazenda_consent` | 1 ano | Marca se o usuário já deu consentimento |
| `bikes_fazenda_preferences` | 1 ano | Armazena preferências detalhadas |

## 🚨 Resolução de Problemas

### **Banner não aparece**
```javascript
// Forçar aparição (console do browser)
document.getElementById('cookieBanner').style.display = 'block';
```

### **Scripts não carregam**
```javascript
// Verificar preferências (console do browser)  
console.log(JSON.parse(localStorage.getItem('bikes_fazenda_preferences')));
```

### **Resetar cookies**
```javascript
// Limpar todas as preferências (console do browser)
document.cookie = 'bikes_fazenda_consent=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
document.cookie = 'bikes_fazenda_preferences=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
location.reload();
```

## 📞 Suporte

Para suporte técnico ou dúvidas:
- **Email**: bikebyfazenda@gmail.com  
- **Telefone**: +351 219 587 530  

---

## 📈 Analytics & Tracking

### **Eventos Disponíveis**
O sistema automaticamente trackeia:
- Cookie consent given/rejected
- Preference changes  
- Modal opens/closes

### **Configurações Avançadas**

```javascript
// Personalizar eventos
CookieManager.onConsentGiven = function(preferences) {
    // Código personalizado quando consent é dado
    console.log('Consent given:', preferences);
    
    // Enviar evento para analytics
    if (typeof gtag !== 'undefined') {
        gtag('event', 'cookie_consent', {
            'analytics': preferences.analytics,
            'marketing': preferences.marketing,
            'functional': preferences.functional
        });
    }
};
```

---

✨ **Sistema implementado com sucesso!** ✨

O sistema de cookies está agora totalmente funcional em todo o site, proporcionando uma experiência transparente e em conformidade legal para todos os utilizadores. 