/**
 * MoneyValueObject - представление денежного значения с валютой
 * Обеспечивает consistency между фронтендом и бэкендом
 */
export class MoneyValueObject {
    constructor(
        public readonly amount: number | null,
        public readonly currency: string,
    ) {}

    /**
     * Создать из отдельных значений
     */
    static create(amount: number | null = null, currency: string = '%'): MoneyValueObject {
        return new MoneyValueObject(amount, currency);
    }

    /**
     * Преобразовать в float для отображения
     */
    toFloat(): number {
        return this.amount ?? 0;
    }

    /**
     * Преобразовать в строку для отображения
     */
    toString(): string {
        if (this.amount === null) {
            return '0';
        }
        const symbol = this.currency === '%' ? '%' : '₽';
        return `${this.amount}${symbol}`;
    }

    /**
     * Преобразовать в формат для отправки на бэкенд
     */
    toJSON(): { amount: number | null; currency: string } {
        return {
            amount: this.amount,
            currency: this.currency,
        };
    }

    /**
     * Проверка на пустое значение
     */
    isEmpty(): boolean {
        return this.amount === null || this.amount === 0;
    }

    /**
     * Создать новый объект с обновленной суммой
     */
    withAmount(amount: number | null): MoneyValueObject {
        return new MoneyValueObject(amount, this.currency);
    }

    /**
     * Создать новый объект с обновленной валютой
     */
    withCurrency(currency: string): MoneyValueObject {
        return new MoneyValueObject(this.amount, currency);
    }
}

/**
 * Тип для использования в формах
 */
export interface MoneyValueInput {
    amount: number | null;
    currency: string;
}

/**
 * Создать MoneyValueObject из простого объекта
 */
export function toMoneyValueObject(input: MoneyValueInput | null): MoneyValueObject {
    if (!input) {
        return MoneyValueObject.create();
    }
    return new MoneyValueObject(input.amount, input.currency);
}

