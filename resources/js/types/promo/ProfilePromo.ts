export interface ProfilePromo {
    id: number;
    name?: string | null;
    img?: string | null;
    description?: string | null;
    type?: string | null;
    discount?: string | null;
    promoTypeId?: number | null;
    created_at: string;
    likes_count?: number;
    rejectionReason?: string | null;
    rejectionMessage?: string | null;
}
