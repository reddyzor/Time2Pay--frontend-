import os
import json

def get_structure(rootdir):
    structure = []
    for dirpath, dirnames, filenames in os.walk(rootdir):
        for dirname in dirnames:
            structure.append({
                "path": os.path.join(dirpath, dirname),
                "name": dirname,
                "type": "directory"
            })
        for filename in filenames:
            structure.append({
                "path": os.path.join(dirpath, filename),
                "name": filename,
                "type": "file"
            })
    return structure

project_structure = get_structure(os.getcwd())
with open('structure.json', 'w') as f:
    json.dump(project_structure, f, indent=2)

print('Project structure saved to structure.json')
