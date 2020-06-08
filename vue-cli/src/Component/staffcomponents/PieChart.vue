<script>
import { Doughnut } from "vue-chartjs";

export default {
  extends: Doughnut,
  mounted() {
    this.renderChart(
      {
        labels: ["Approved", "Pending", "Rejected"],
        datasets: [
          {
            backgroundColor: ["#B2FF59", "#FFC107", "#78909C"],
            data: [100, 80, 50]
          }
        ]
      },
      { responsive: true, maintainAspectRatio: false},
    );
  }
};
</script>