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
     banner_slots_total: number;
     own_banner_slots_total: number;
     cashback_bonus_percent: number;
     auto_schedule_enabled: boolean;
     auto_restart_enabled: boolean;
     auto_bump_enabled: boolean;
    features: TariffFeatureModel[];
}
