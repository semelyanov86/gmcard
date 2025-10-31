import { useToast } from 'vue-toastification';

export type NotifyOptions = {
    title?: string;
    timeoutMs?: number;
};

export interface NotificationService {
    success(message: string, options?: NotifyOptions): void;
    error(message: string, options?: NotifyOptions): void;
    info(message: string, options?: NotifyOptions): void;
    warning(message: string, options?: NotifyOptions): void;
}

const toast = useToast();

export const notify: NotificationService = {
    success(message: string, options?: NotifyOptions) {
        toast.success(options?.title ? `${options.title}: ${message}` : message, {
            timeout: options?.timeoutMs ?? 3000,
        });
    },
    error(message: string, options?: NotifyOptions) {
        toast.error(options?.title ? `${options.title}: ${message}` : message, {
            timeout: options?.timeoutMs ?? 5000,
        });
    },
    info(message: string, options?: NotifyOptions) {
        toast.info(options?.title ? `${options.title}: ${message}` : message, {
            timeout: options?.timeoutMs ?? 3000,
        });
    },
    warning(message: string, options?: NotifyOptions) {
        toast.warning(options?.title ? `${options.title}: ${message}` : message, {
            timeout: options?.timeoutMs ?? 4000,
        });
    },
};


