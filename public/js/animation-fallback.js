// Animation Fallback Script
// Detecta problemas de animação e aplica soluções

(function() {
    'use strict';
    
    // Verifica se as animações CSS estão funcionando
    function testCSSAnimations() {
        var testElement = document.createElement('div');
        testElement.style.position = 'absolute';
        testElement.style.top = '-9999px';
        testElement.style.left = '-9999px';
        testElement.style.width = '1px';
        testElement.style.height = '1px';
        testElement.style.animationName = 'fadeIn';
        testElement.style.animationDuration = '0.001s';
        testElement.className = 'animate__animated animate__fadeIn';
        
        document.body.appendChild(testElement);
        
        var computedStyle = window.getComputedStyle(testElement);
        var animationName = computedStyle.animationName;
        
        document.body.removeChild(testElement);
        
        return animationName && animationName !== 'none';
    }
    
    // Verifica se o Animate.css foi carregado
    function testAnimateCSS() {
        var testElement = document.createElement('div');
        testElement.className = 'animate__animated';
        document.body.appendChild(testElement);
        
        var computedStyle = window.getComputedStyle(testElement);
        var animationFillMode = computedStyle.animationFillMode;
        
        document.body.removeChild(testElement);
        
        return animationFillMode === 'both';
    }
    
    // Carrega o CSS fallback se necessário
    function loadAnimationFallback() {
        var link = document.createElement('link');
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = '/css/animate-fallback.css';
        link.onload = function() {
            console.log('Animation fallback loaded successfully');
            // Trigger uma re-verificação das animações
            setTimeout(initializeAnimations, 100);
        };
        link.onerror = function() {
            console.error('Failed to load animation fallback');
        };
        document.head.appendChild(link);
    }
    
    // Força a aplicação de animações manualmente se necessário
    function forceAnimations() {
        // Encontra todos os elementos com classes de animação
        var animatedElements = document.querySelectorAll('[class*="animate__"]');
        
        animatedElements.forEach(function(element) {
            if (!element.style.animationName || element.style.animationName === 'none') {
                // Aplica uma animação genérica se nenhuma estiver funcionando
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                
                // Anima para o estado final
                setTimeout(function() {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, 50);
            }
        });
    }
    
    // Inicializa as animações
    function initializeAnimations() {
        // Testa se as animações funcionam
        var cssAnimationsWork = testCSSAnimations();
        var animateCSSLoaded = testAnimateCSS();
        
        console.log('CSS Animations work:', cssAnimationsWork);
        console.log('Animate.css loaded:', animateCSSLoaded);
        
        if (!cssAnimationsWork || !animateCSSLoaded) {
            console.log('Loading animation fallback...');
            loadAnimationFallback();
            
            // Se ainda assim não funcionar, força as animações
            setTimeout(function() {
                if (!testCSSAnimations()) {
                    console.log('Forcing manual animations...');
                    forceAnimations();
                }
            }, 500);
        }
    }
    
    // Adiciona animações aos elementos dinamicamente criados
    function observeNewElements() {
        if (window.MutationObserver) {
            var observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'childList') {
                        mutation.addedNodes.forEach(function(node) {
                            if (node.nodeType === 1 && node.classList && 
                                node.classList.toString().includes('animate__')) {
                                // Aplica animação ao novo elemento
                                setTimeout(function() {
                                    if (!testCSSAnimations()) {
                                        forceAnimationOnElement(node);
                                    }
                                }, 50);
                            }
                        });
                    }
                });
            });
            
            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        }
    }
    
    // Força animação em um elemento específico
    function forceAnimationOnElement(element) {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        
        setTimeout(function() {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, 50);
    }
    
    // Corrige configurações de reduced motion
    function fixReducedMotion() {
        // Verifica se o usuário tem reduced motion ativado
        if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            console.log('Reduced motion detected, applying fixes...');
            
            // Adiciona CSS para forçar animações mesmo com reduced motion
            var style = document.createElement('style');
            style.textContent = `
                @media (prefers-reduced-motion: reduce) {
                    .animate__animated {
                        animation-duration: 0.3s !important;
                        animation-iteration-count: 1 !important;
                    }
                    
                    .animate__animated:not([class*="Out"]) {
                        opacity: 1 !important;
                        transform: none !important;
                    }
                }
            `;
            document.head.appendChild(style);
        }
    }
    
    // Adiciona suporte para navegadores antigos
    function addLegacySupport() {
        // Polyfill para requestAnimationFrame
        if (!window.requestAnimationFrame) {
            window.requestAnimationFrame = function(callback) {
                return setTimeout(callback, 16);
            };
        }
        
        // Polyfill para transform
        var testEl = document.createElement('div');
        var transform = 'transform' in testEl.style ? 'transform' :
                       'webkitTransform' in testEl.style ? 'webkitTransform' :
                       'mozTransform' in testEl.style ? 'mozTransform' :
                       'msTransform' in testEl.style ? 'msTransform' : null;
        
        if (!transform) {
            // Fallback para navegadores muito antigos
            console.log('Transform not supported, using fallback');
            forceAnimations();
        }
    }
    
    // Função principal de inicialização
    function init() {
        console.log('Initializing animation fallback system...');
        
        // Corrige reduced motion
        fixReducedMotion();
        
        // Adiciona suporte legacy
        addLegacySupport();
        
        // Observa novos elementos
        observeNewElements();
        
        // Inicializa as animações
        initializeAnimations();
    }
    
    // Inicia quando o DOM estiver pronto
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
    // Reexecuta em mudanças de orientação
    window.addEventListener('orientationchange', function() {
        setTimeout(initializeAnimations, 300);
    });
    
    // Torna funções disponíveis globalmente para debugging
    window.animationFallback = {
        test: testCSSAnimations,
        testAnimateCSS: testAnimateCSS,
        force: forceAnimations,
        init: initializeAnimations
    };
    
})(); 