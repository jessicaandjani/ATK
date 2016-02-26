#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <omp.h>
#include <math.h>
#define ELEMENT_MAX 10000
#define verbose 0

typedef struct {
  int * arr;
  int n;
  int min;
  int max;
} Bucket;

int *create_rand_nums(int num_elements, int * min, int * max) {
    int *rand_nums = (int *)malloc(sizeof(int) * num_elements);
    int i;

    srand(time(NULL));
    rand_nums[0] = rand() % ELEMENT_MAX;
    *min = rand_nums[0];
    *max = rand_nums[0];

    for (i = 1; i < num_elements; i++) {
        rand_nums[i] = rand() % ELEMENT_MAX;
        if (*max < rand_nums[i]) {
          *max = rand_nums[i];
        }
        if (*min > rand_nums[i]) {
          *min = rand_nums[i];
        }
    }
    return rand_nums;
}

void pushToBucket(Bucket * b, int x) {
  b->arr[b->n++] = x;
}

void sort(int * arr, int n) {
  int c, d, t;
  for (c = 1 ; c <= n - 1; c++) {
    d = c;

    while ( d > 0 && arr[d] < arr[d-1]) {
      t          = arr[d];
      arr[d]   = arr[d-1];
      arr[d-1] = t;

      d--;
    }
  }
}

int compute_avg(int *array, int num_elements) {
  int sum = 0.f;
  int i;
  for (i = 0; i < num_elements; i++) {
    sum += array[i];
  }
  return sum / num_elements;
}

int main(int argc, char** argv) {
  if (argc != 3) {
    fprintf(stderr, "Usage: bucket_sort nElement nThreads\n");
    exit(1);
  }

  clock_t begin, end;
  begin = clock();
  int nElement = atoi(argv[1]);

  int world_size = atoi(argv[2]);

  //START PROCESS

    int min, max, i, j;
    int *rand_nums = create_rand_nums(nElement, &min, &max);

    if (verbose) {
      printf("min: %d, max: %d\n", min, max);
      for (i = 0; i < nElement; i++) {
        printf("%d ", rand_nums[i]);
      }
      printf("\n");
    }

    Bucket buckets[world_size];

    int step = (int)ceil((float)(max - min) / (float)(world_size));
    buckets[0].min = min;
    buckets[0].max = min + step;
    buckets[0].arr = (int *)malloc(sizeof(int) * nElement);
    buckets[0].n = 0;

    for (i = 1; i < world_size; i++) {
      buckets[i].min = buckets[i-1].max + 1;
      buckets[i].max = buckets[i].min + step;
      buckets[i].arr = (int *)malloc(sizeof(int) * nElement);
      buckets[i].n = 0;
    }

    for (i = 0; i < nElement; i++) {
      for (j = 0; j < world_size; j++) {
        if (rand_nums[i] <= buckets[j].max && rand_nums[i] >= buckets[j].min) {
          pushToBucket(&buckets[j], rand_nums[i]);
          break;
        }
      }
    }

    for (i = 0; i < world_size; i++) {
      if (verbose) {
        printf("Bucket %d\n min:%d\n max:%d\n arr:[ ", i + 1, buckets[i].min, buckets[i].max);
        for (j = 0; j < buckets[i].n; j++) {
          printf("%d ", buckets[i].arr[j]);
        }
        printf("]\n");
      }
    }

    int thread_count = strtol(argv[2], NULL, 10);
	#pragma omp parallel for num_threads(thread_count) 
	for (i = 0; i < world_size; i++) {
		sort(buckets[i].arr, buckets[i].n);
	}

    int * result = (int *) malloc(sizeof(int) * nElement);
    int nResult = 0;
    for (i = 0; i < world_size; i++) {
      for (j = 0; j < buckets[i].n; j++) {
        result[nResult++] = buckets[i].arr[j];
      }
    }

	if (verbose) {
		for (i = 0; i < nResult; i++) {
		  printf("%d ", result[i]);
		}
		printf("\n");
	}
    
    end = clock();
    printf("Time Spent: %F\n", (double)(end - begin) / CLOCKS_PER_SEC);

}

