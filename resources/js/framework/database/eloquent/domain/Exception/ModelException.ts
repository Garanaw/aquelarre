import Exception from "../../../../Exceptions/Exception";
import Model from "../../Model";

export default class ModelException extends Exception
{
    private model: Model | null = null;

    constructor(message: string, code: number = 500, model: Model | null = null) {
        super(message, code);
        this.model = model;
    }

    getModel(): Model | null {
        return this.model;
    }

    setModel(model: Model | null): this {
        this.model = model;
        return this;
    }
}
