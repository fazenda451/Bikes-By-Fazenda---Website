<!-- Toastr Assets -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Sistema de Notificações Forçado -->
<script>
$(document).ready(function() {
    // Configurar Toastr
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    
    console.log('🎉 Toastr loaded and configured!');
    
    // Sistema de notificações via URL parameters (funciona sempre)
    const urlParams = new URLSearchParams(window.location.search);
    
    // Verificar se há notificações na URL
    if (urlParams.has('notification')) {
        const type = urlParams.get('type') || 'info';
        const message = decodeURIComponent(urlParams.get('notification'));
        
        console.log('📢 URL notification:', type, message);
        
        if (toastr[type]) {
            toastr[type](message);
        } else {
            toastr.info(message);
        }
        
        // Limpar a URL
        const newUrl = window.location.pathname;
        window.history.replaceState({}, document.title, newUrl);
    }
    
    // Sistema de notificações via session (Laravel) - APENAS TOASTR
    @if(session()->has('success'))
        var successMessage = {!! json_encode(session('success')) !!};
        console.log('✅ Session success:', successMessage);
        toastr.success(successMessage);
    @endif
    
    @if(session()->has('error'))
        var errorMessage = {!! json_encode(session('error')) !!};
        console.log('❌ Session error:', errorMessage);
        toastr.error(errorMessage);
    @endif
    
    @if(session()->has('warning'))
        var warningMessage = {!! json_encode(session('warning')) !!};
        console.log('⚠️ Session warning:', warningMessage);
        toastr.warning(warningMessage);
    @endif
    
    @if(session()->has('info'))
        var infoMessage = {!! json_encode(session('info')) !!};
        console.log('ℹ️ Session info:', infoMessage);
        toastr.info(infoMessage);
    @endif
    
    // Sistema de notificações via with() do Laravel - APENAS TOASTR
    @if(session()->has('notification_type') && session()->has('notification_message'))
        var notificationType = {!! json_encode(session('notification_type')) !!};
        var notificationMessage = {!! json_encode(session('notification_message')) !!};
        console.log('🔔 With notification:', notificationType, notificationMessage);
        
        if (toastr[notificationType]) {
            toastr[notificationType](notificationMessage);
        } else {
            toastr.info(notificationMessage);
        }
    @endif
    
    // Sistema de notificações via localStorage (persistente)
    function checkLocalStorageNotifications() {
        const notifications = ['success', 'error', 'warning', 'info'];
        
        notifications.forEach(function(type) {
            const key = 'toastr_' + type;
            const message = localStorage.getItem(key);
            
            if (message) {
                console.log('💾 LocalStorage ' + type + ':', message);
                toastr[type](message);
                localStorage.removeItem(key);
            }
        });
    }
    
    // Verificar localStorage
    checkLocalStorageNotifications();
    
    // Interceptar formulários para adicionar notificações
    $('form').on('submit', function() {
        console.log('📝 Form submitted');
        
        // Adicionar loading state
        var submitBtn = $(this).find('button[type="submit"]');
        if (submitBtn.length > 0) {
            submitBtn.prop('disabled', true);
            submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Processing...');
        }
    });
    
    // Interceptar links para adicionar loading
    $('a[href]:not([href^="#"]):not([target="_blank"])').on('click', function(e) {
        const href = $(this).attr('href');
        
        // Não interceptar links especiais
        if (href.includes('javascript:') || href.includes('mailto:') || href.includes('tel:')) {
            return;
        }
        
        console.log('🔗 Link clicked:', href);
    });
    
    // Função global para mostrar notificações
    window.showToastr = function(type, message) {
        console.log('🌍 Global notification:', type, message);
        
        if (toastr[type]) {
            toastr[type](message);
        } else {
            toastr.info(message);
        }
    };
    
    // Função para salvar notificação no localStorage
    window.saveNotification = function(type, message) {
        localStorage.setItem('toastr_' + type, message);
        console.log('💾 Notification saved to localStorage:', type, message);
    };
    
    // Interceptar o Flasher se existir
    if (typeof flasher !== 'undefined') {
        console.log('🔥 Flasher detected, intercepting...');
        
        const originalRender = flasher.render;
        if (originalRender) {
            flasher.render = function(data) {
                console.log('🔥 Flasher render interceptado:', data);
                
                if (data && data.envelopes) {
                    data.envelopes.forEach(function(envelope) {
                        const type = envelope.type || 'info';
                        const message = envelope.message || '';
                        const title = envelope.title || '';
                        
                        console.log('🔥 Displaying via Toastr:', type, message, title);
                        
                        if (toastr[type]) {
                            toastr[type](message, title);
                        } else {
                            toastr.info(message, title);
                        }
                    });
                }
                
                // Chamar o método original também
                try {
                    return originalRender.call(this, data);
                } catch (e) {
                    console.log('⚠️ Error in original Flasher (ignored):', e);
                }
            };
        }
    }
    
    // Teste automático para verificar se funciona
    setTimeout(function() {
        console.log('🧪 Automatic system test...');
        
        // Verificar se há mensagens de session
        const hasSessionMessage = @if(session()->has('success') || session()->has('error') || session()->has('warning') || session()->has('info')) true @else false @endif;
        
        if (!hasSessionMessage) {
            console.log('ℹ️ No session notifications found');
        }
        
        // Verificar se o Toastr está funcionando
        if (typeof toastr !== 'undefined' && toastr.success) {
            console.log('✅ Toastr system is working correctly!');
        } else {
            console.error('❌ Error: Toastr is not working!');
        }
    }, 1000);
    
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow', function() {
            $(this).remove();
        });
    }, 5000);
});

// Função para testar notificações (pode ser chamada no console)
function testarNotificacoes() {
    console.log('🧪 Testing all notifications...');
    
    if (typeof toastr !== 'undefined') {
        toastr.success('Test success notification!');
        setTimeout(() => toastr.error('Test error notification!'), 1000);
        setTimeout(() => toastr.warning('Test warning notification!'), 2000);
        setTimeout(() => toastr.info('Test info notification!'), 3000);
    } else {
        console.error('Toastr not available!');
    }
}
</script> 