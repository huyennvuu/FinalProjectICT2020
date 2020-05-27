<template>
    <div>
        <button @click="toggleAllCollapse">Expand/Collapse</button>

    <el-collapse v-model="activeNames">
      <el-collapse-item :title="item.title" :name="item.id" :key="item.id" v-for="item in panels">
        <div>
          <p v-html="item.article"></p>
        </div>
      </el-collapse-item>
    </el-collapse>
    </div>
</template>
<script>
export default {
    data() {
    return {
      activeNames: [],

      panels: [
        {
          id: "id-1",
          title: "first panel",
          article:
            "Consistent with real life: in line with the process and logic of real life, and comply with languages and habits that the users are used to;\n" +
            "Consistent within interface: all elements should be consistent, such as: design style, icons and texts, position of elements, etc."
        },
        {
          id: "id-2",
          title: "second panel",
          article: "article 2 ..."
        },
        {
          id: "id-3",
          title: "third panel",
          article: "article 3 ..."
        }
      ]
    };
  },

  methods: {
    toggleAllCollapse() {
      const hasCollapse = this.activeNames.length === 0;
      if (hasCollapse) {
        // You can dynamically generate it based on your case.
        this.activeNames = this.panels.map(item => item.id);
      } else {
        this.activeNames = [];
      }
      console.log("toggleAllCollapse: activeNames", this.activeNames);
    }
  }
}
</script>