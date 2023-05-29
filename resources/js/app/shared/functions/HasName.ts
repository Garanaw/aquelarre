type Nameable = {
    name: string;
    setName?(name: string): Nameable;
    getName?(): string;
}

export default function useName(name: string, nameable: Nameable | unknown): void {
    if (!(nameable instanceof Object )|| !('name' in nameable)) {
        throw new Error('The nameable object must have a name property.');
    }
    nameable.name = name;
}
