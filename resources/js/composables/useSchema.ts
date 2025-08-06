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
        ],
        script: createSchemaScripts(),
    });
}
