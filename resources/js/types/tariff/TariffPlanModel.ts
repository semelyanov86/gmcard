import type { TariffFeatureModel } from '@/types/tariff/TariffFeatureModel';

export interface TariffPlanModel {
    id: number;
    slug: string;
    name: string;
    description: string | null;
    price: number;
    ads_count: number;
    banner_price: number | null;
    extra_ad_price: number | null;
    features: TariffFeatureModel[];
}


