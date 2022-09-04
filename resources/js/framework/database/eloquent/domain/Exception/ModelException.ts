import Exception from "../../../../Exceptions/Exception";
import Model from "../../Model";

export default class ModelException extends Exception
{
    private model: Model<any> | null = null;

    constructor(message: string, code: number = 500, model: Model<any> | null = null) {
        super(message, code);
        this.model = model;
    }

    getModel(): Model<any> | null {
        return this.model;
    }

    setModel(model: Model<any> | null): this {
        this.model = model;
        return this;
    }
}
