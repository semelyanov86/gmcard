import { useHead } from '@vueuse/head';
import type { MetaData } from '@/types/schema';

function createSeoTitle(baseTitle: string, page?: string): string {
    if (!page) return baseTitle;
    
    const pageTitles: Record<string, string> = {
        'landing': 'GM CARD для бизнеса: Привлекайте клиентов скидками и бонусами | Партнерская программа',
        'dashboard': 'Панель управления | GM CARD',
        'settings': 'Настройки | GM CARD',
        'profile': 'Профиль | GM CARD',
        'login': 'Вход в систему | GM CARD',
        'register': 'Регистрация | GM CARD',
    };
    
    return pageTitles[page] || baseTitle;
}

export function useSchema(meta: MetaData, page?: string) {
    const seoTitle = createSeoTitle(meta.title, page);
    
    const createSchemaScripts = () => {
        const scripts = [];
        
        if (meta.schema?.organization) {
            scripts.push({
                type: 'application/ld+json',
                children: JSON.stringify({
                    '@context': 'https://schema.org',
                    ...meta.schema.organization
                })
            });
        }
        
        if (meta.schema?.website) {
            scripts.push({
                type: 'application/ld+json',
                children: JSON.stringify({
                    '@context': 'https://schema.org',
                    ...meta.schema.website
                })
            });
        }
        
        return scripts;
    };

    useHead({
        title: seoTitle,
        meta: [
            { name: 'description', content: meta.description },
            ...(meta.keywords ? [{ name: 'keywords', content: meta.keywords }] : []),
            { property: 'og:title', content: meta.og.title },
            { property: 'og:description', content: meta.og.description },
            { property: 'og:image', content: meta.og.image },
            { property: 'og:type', content: meta.og.type },
            // Twitter/X Card теги
            ...(meta.twitter ? [
                { name: 'twitter:card', content: meta.twitter.card },
                { name: 'twitter:title', content: meta.twitter.title },
                { name: 'twitter:description', content: meta.twitter.description },
                { name: 'twitter:image', content: meta.twitter.image },
                { name: 'twitter:site', content: meta.twitter.site },
            ] : []),
        ],
        script: createSchemaScripts()
    });
}
