import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';
import type { UserDataModel } from './UserDataModel';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    userData: UserDataModel | null;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
    flash: {
        success?: string;
        error?: string;
    };
};

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export type BreadcrumbItemType = BreadcrumbItem;

export type { CategoryModel } from './CategoryModel';
export type { CityModel } from './CityModel';
export type { ContactModel } from './ContactModel';
export type { DiscountFilterModel } from './DiscountFilterModel';
export type { PromoTypeModel } from './PromoTypeModel';
export type { ScheduleModel } from './ScheduleModel';
export type { SocialNetworkModel } from './SocialNetworkModel';
export type { UserDataModel } from './UserDataModel';
export type { WeekdayModel } from './WeekdayModel';

export type UIMode = 'mobile' | 'desktop';
