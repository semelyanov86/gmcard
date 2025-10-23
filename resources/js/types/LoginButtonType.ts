export const LoginButtonType = {
    Start: 'start',
    Login: 'login',
    Mobile: 'mobile',
} as const;

export type LoginButtonType = (typeof LoginButtonType)[keyof typeof LoginButtonType];

