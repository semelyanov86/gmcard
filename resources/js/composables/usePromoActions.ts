import { router } from '@inertiajs/vue3';

export function usePromoActions() {
    function deletePromo(promoId: number): void {
        if (!confirm('Удалить акцию?')) {
            return;
        }

        router.delete(route('promos.destroy', promoId), {
            preserveScroll: true,
        });
    }

    function completePromo(promoId: number): void {
        router.post(route('promos.complete', promoId));
    }

    return {
        deletePromo,
        completePromo,
    };
}

