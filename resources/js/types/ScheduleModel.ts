export interface ScheduleModel {
    enabled: boolean;
    days: string[];
    timeRange: {
        enabled: boolean;
        start: string;
        end: string;
    };
}
