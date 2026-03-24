export interface PromoAddressItem {
    id: number;
    name: string;
    openHours?: Record<string, string> | null;
    phone?: string | null;
    phoneSecondary?: string | null;
    website?: string | null;
}
