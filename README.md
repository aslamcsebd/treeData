
### Recursive function

### 1. Table design [tree_data]
| id  | parent_id | name |
| :-- | :-------: | ---: |
| 1   | 0 |     Bangladesh |
| 2   | 0 |     India |
| 3   | 1 |     Dhaka |
| 4   | 1 |     Chittagong |
| 5   | 4 |     Agrabad |
| 6   | 5 |     College road |

### 2. Model [tree_data]
```
public function children(){
    return $this->hasMany(Tree_data::class, 'parent_id')->with('children');        
}
```

### 3. Controller
```
$parent = Tree_data::where('parent_id', 0)->with(['children'])->get();

```

### 4. Output
```
Bangladesh
    Dhaka 
    Chittagong 
        Agrabad 
            College road
India
```