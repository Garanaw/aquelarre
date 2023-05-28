import Exception from "../../../../Exceptions/Exception";

export default class ModelException extends Exception
{
    private model: any | null = null;

    constructor(message: string, code: number = 500, model: any | null = null) {
        super(message, code);
        this.model = model;
    }

    getModel(): any | null {
        return this.model;
    }

    setModel(model: any | null): this {
        this.model = model;
        return this;
    }
}
