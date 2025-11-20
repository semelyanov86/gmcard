import { MenuType } from './enums/MenuType';

export interface MenuData {
    id: number;
    label: string;
    url: string;
    type: MenuType;
    order: number;
    is_active: boolean;
}
