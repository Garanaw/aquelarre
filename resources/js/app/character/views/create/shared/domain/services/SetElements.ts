import { nextTick, reactive } from 'vue';

export default class SetElements
{
    private areSet = new Map();

    private setSections = new Map();

    private dependencies = new Map();

    private seeing = new Map();

    constructor(
        areSet: Map<string, boolean> = new Map(),
        setSections: Map<string, boolean> = new Map(),
        dependencies: Map<string, string[]> = new Map(),
        seeing: Map<string, boolean> = new Map(),
    ) {
        this.areSet = reactive(areSet);
        this.setSections = reactive(setSections);
        this.dependencies = reactive(dependencies);
        this.seeing = reactive(seeing);
    }

    public complete(target: string): Promise<void>
    {
        return nextTick(() => {
            this.areSet.set(target, true);
        });
    }

    public isComplete(target: string): boolean
    {
        return this.areSet.has(target) && this.areSet.get(target);
    }

    public canSee(target: string): boolean
    {
        return this.areSet.get(target) === true;
    }
}
