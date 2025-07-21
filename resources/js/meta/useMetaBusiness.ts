import { useHead } from '@vueuse/head';

export function useMetaBusinessPage() {
    useHead({
        title: 'GM CARD для бизнеса: Привлекайте клиентов скидками и бонусами | Партнерская программа',
        meta: [
            {
                name: 'description',
                content: 'Подключите свой бизнес, ИП или самозанятость к GM Card. Получите новых клиентов, увеличьте средний чек и лояльность с помощью нашей программы скидок и бонусов.'
            },
            {
                property: 'og:title',
                content: 'GM CARD для бизнеса: Привлекайте клиентов скидками и бонусами | Партнерская программа'
            },
            {
                property: 'og:description',
                content: 'Подключите свой бизнес, ИП или самозанятость к GM Card. Получите новых клиентов, увеличьте средний чек и лояльность с помощью нашей программы скидок и бонусов.'
            },
            {
                property: 'og:image',
                content: 'https://gmcard.ru/images/og-business.jpg'
            },
            {
                property: 'og:url',
                content: 'https://gmcard.ru' // /business
            },
            {
                property: 'og:type',
                content: 'website'
            }
        ]
    })
}
