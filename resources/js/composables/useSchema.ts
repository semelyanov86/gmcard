import type { MetaData } from '@/types/schema';
import { useHead } from '@vueuse/head';

export function useSchema(meta: MetaData) {
    const createSchemaScripts = () => {
        const scripts = [];

        if (meta.schema?.organization) {
            scripts.push({
                type: 'application/ld+json',
                children: JSON.stringify({
                    '@context': 'https://schema.org',
                    ...meta.schema.organization,
                }),
            });
        }

        if (meta.schema?.website) {
            scripts.push({
                type: 'application/ld+json',
                children: JSON.stringify({
                    '@context': 'https://schema.org',
                    ...meta.schema.website,
                }),
            });
        }

        return scripts;
    };

    useHead({
        title: meta.title,
        meta: [
            { name: 'description', content: meta.description },
            { property: 'og:title', content: meta.og.title },
            { property: 'og:description', content: meta.og.description },
            { property: 'og:image', content: meta.og.image },
            { property: 'og:type', content: meta.og.type },
            // Twitter/X Card
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
